<?php


namespace Altech\Controller;


use Altech\Model\Entity\User;
use Altech\Model\Repository\UserRepository;
use App\Component\Controller;
use App\KernelFoundation\Request;
use App\KernelFoundation\Security;
use Exception;

class AdminController extends Controller
{
    public function index()
    {
        /** @var UserRepository $repo */
        $repo = $this->getRepository(UserRepository::class);

        return $this->render('/admin/index.php', [
            "title" => "Comptes administrateurs",
            "admins" => $repo->findAllByRole(Security::ROLE_ADMIN)
        ]);
    }

    public function create()
    {
        $req = $this->getRequest();

        if ($req->is(Request::METHOD_POST)) {
            $form = $req->form;

            if (!empty($form->get("firstname")) &&
                !empty($form->get("lastname")) &&
                !empty($form->get("email")) &&
                !empty($form->get("phone")) &&
                !empty($form->get("role"))
            ){
                /** @var UserRepository $repo */
                $repo = $this->getRepository(UserRepository::class);

                $newAdmin = (new User())
                    ->setName($form->get("lastname"). " ".$form->get("firstname"))
                    ->setRole($form->get("role"))
                    ->setEmail($form->get("email"))
                    ->setPhone($form->get("phone"))
                    ->setPassword(bin2hex(random_bytes(10))); //We set a random password to avoid connection

                $repo->insert($newAdmin);
                //TODO: send email
                $this->redirect("/admin/user/".$newAdmin->getId());
            }

        }

        return $this->render('/admin/form.php', [
            "title" => "Ajouter un nouvel administrateur",
            "admin" => (new User())->setRole(Security::ROLE_ADMIN)
        ]);
    }

    public function edit($id)
    {
        /** @var UserRepository $repo */
        $repo = $this->getRepository(UserRepository::class);
        $admin = $repo->findById($id);

        if($admin){
            $req = $this->getRequest();

            if ($req->is(Request::METHOD_POST)) {
                $form = $req->form;
                if (!empty($form->get("firstname")) &&
                    !empty($form->get("lastname")) &&
                    !empty($form->get("email")) &&
                    !empty($form->get("phone")) &&
                    !empty($form->get("role"))
                ){
                    $newAdmin = (new User())
                        ->setName($form->get("lastname"). " ".$form->get("firstname"))
                        ->setRole($form->get("role"))
                        ->setEmail($form->get("email"))
                        ->setPhone($form->get("phone"))
                        ->setPassword(bin2hex(random_bytes(10))); //We set a random password to avoid connection
                    $repo->insert($newAdmin);
                    //TODO: send email
                }
            }
            return $this->render('/admin/form.php', [
                "title" => "Administrateur $id",
                "admin" => $admin
            ]);
        }
        throw new Exception("invalid user id: $id");
    }

    public function delete($id)
    {
        /** @var UserRepository $repo */
        $repo = $this->getRepository(UserRepository::class);
        /** @var User $admin */
        $admin = $repo->findById($id);
        $loggedUser = $this->getUser();

        // We check that the user exists and that he isn't trying to delete his account by himself
        if ($admin && $loggedUser->getId() !== $id) {
            if ($admin->getRole() == Security::ROLE_SUPER_ADMIN && $repo->findSuperAdminCount() < 2) {
                throw new Exception("Il doit rester au minimum un super-admin en permanence");
            }

            $repo->remove($admin);
            $this->redirect("/admin/user");
        }

        throw new Exception("invalid user id: $id");
    }
}