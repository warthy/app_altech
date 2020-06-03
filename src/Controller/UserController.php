<?php


namespace Altech\Controller;


use Altech\Model\Entity\User;
use Altech\Model\Repository\UserRepository;
use App\Component\Controller;
use App\KernelFoundation\Request;
use App\KernelFoundation\Security;
use Exception;

class UserController extends Controller
{
    public function profile()
    {
        return $this->render('/user/profile.php', [
            'title' => "Votre profil",
            'user' => $this->getUser(),
        ]);
    }


    public function edit()
    {
        $req = $this->getRequest();
        if ($req->is(Request::METHOD_POST)) {
            $form = $req->form;
            $user = $this->getUser();
            if (!empty($form->get('email')) && !empty($form->get('phone'))) {
                $repo = $this->getRepository(UserRepository::class);
                $user
                    ->setEmail($form->get('email'))
                    ->setPhone($form->get('phone'));

                if (Security::hasPermission(Security::ROLE_ADMIN)) {
                    if (!empty($form->get('firstname')) && !empty($form->get('lastname'))) {
                        $user->setName($form->get('firstname') . ' ' . $form->get('lastname'));
                    } else {
                        throw new Exception("Incomplete form");
                    }
                } else {
                    $user
                        ->setRepresentativeLastName($form->get("r_lastname"))
                        ->setRepresentativeFirstName($form->get("r_firstname"))
                        ->setRepresentativeEmail($form->get("r_email"))
                        ->setRepresentativePhone($form->get("r_phone"));
                }

                $file = $req->files->get("picture");
                if ($file["size"] > 0) {
                    //If there was a previous picture we delete it
                    if ($user->getPicture())
                        unlink(User::PICTURE_DIR . $user->getPicture());
                    $user->setPicture(self::checkAndUploadPicture($file));
                }

                $repo->update($user);
            }
        }
        $this->redirect("/profile");
    }

    public function changePassword()
    {
        $req = $this->getRequest();
        if ($req->is(Request::METHOD_POST)) {
            $form = $req->form;
            if (!empty($form->get("newpass")) && !empty($form->get("newpass_confirm"))) {
                $user = $this->getUser();
                if (password_verify($form->get('password'), $user->getPassword())) {
                    $repo = $this->getRepository(UserRepository::class);
                    $user->setPassword($user->setPassword(password_hash($form->get("newpass"), PASSWORD_BCRYPT)));

                    $repo->update($user);
                }
            }
            throw new Exception("Invalid form data");
        }
        $this->redirect("/profile");
    }


    public static function checkAndUploadPicture($file): string
    {
        $metadata = pathinfo($file['name']);
        if (in_array($metadata['extension'], ['png', 'svg', 'jpeg'])) {
            $random = bin2hex(random_bytes(20)) . '.' . $metadata['extension'];
            if (move_uploaded_file($file['tmp_name'], User::PICTURE_DIR . $random)) {
                return $random;
            } else {
                throw new Exception("Erreur d'upload du fichier");
            }
        }
        throw new Exception("Fichier invalide");
    }
}