<?php

namespace Altech\Controller;

use Altech\Model\Entity\User;
use Altech\Model\Repository\UserRepository;
use App\Component\Controller;
use App\KernelFoundation\Request;
use App\KernelFoundation\Security;
use Exception;

class SecurityController extends Controller
{
    public function login()
    {
        $error = false;
        $req = $this->getRequest();

        // If request is post then form has been submitted
        if ($req->is(Request::METHOD_POST)) {
            $form = $req->form;

            if (!empty($form->get('email')) && !empty($form->get('password'))) {
                /** @var UserRepository $repository */
                $repository = $this->getRepository(UserRepository::class);

                $user = $repository->findByEmail($form->get('email'));
                if ($user && password_verify($form->get('password'), $user->getPassword())) {
                    $_SESSION['auth'] = $user->getId();
                    $_SESSION['role'] = $user->getRole();
                    $this->redirect('/');
                }
            }
            $error = true;
        }
        return $this->render('/security/login.php', [
            'error' => $error
        ], null, false);
    }

    public function logout()
    {
        unset($_SESSION['auth'], $_SESSION['role']);
        $this->redirect('/');
    }

    public function recoverPassword()
    {
        $req = $this->getRequest();
        $status = false;

        if ($req->is(Request::METHOD_POST)) {
            $status = true;
            $form = $req->form;
            $email = $form->get('email');

            if (!empty($email)) {
                /** @var UserRepository $repository */
                $repository = $this->getRepository(UserRepository::class);

                /** @var User $user */
                $user = $repository->findByEmail($email);
                if ($user) {
                    $user->setRecoverToken(sha1(mt_rand(1, 90000) . Security::SECRET_SALT));
                    $repository->update($user);

                    $mailer = $this->getMailer();
                    try {
                        $mailer
                            ->to($email)
                            ->subject('Réinitalisation mot de passe')
                            ->setBody('password-reset.php', [
                                'token' => $user->getRecoverToken()
                            ]);

                        $mailer->send();
                    } catch (Exception $e) {
                        die(var_dump($e));
                        //TODO: handle Exception
                    }

                }

            }
        }
        return $this->render('/security/password-recover.php', [
            "status" => $status
        ], null, false);
    }


    public
    function resetPassword(string $token)
    {
        $req = $this->getRequest();
        /** @var UserRepository $repository */
        $repository = $this->getRepository(UserRepository::class);

        $user = $repository->findByToken($token);
        if ($user) {
            $succeed = false;
            $error = "";
            if ($req->is(Request::METHOD_POST)) {
                $form = $req->form;

                if (!empty($form->get('password')) && !empty($form->get('password_confirm'))) {
                    if ($form->get('password') == $form->get('password_confirm')) {
                        $user->setPassword(password_hash($form->get('password'), PASSWORD_BCRYPT));
                        $user->setRecoverToken(null);

                        $repository->update($user);
                        $succeed = true;
                    } else {
                        $error = "les mots de passes sont différents.";
                    }
                } else {
                    $error = "vous devez remplir tous les entrées du formulaire";
                }
            }

            return $this->render('/security/password-reset.php', [
                "succeed" => $succeed,
                "error" => $error
            ], null, false);
        }
        $this->redirect("/");
    }
}