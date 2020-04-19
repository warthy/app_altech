<?php

namespace Altech\Controller;

use Altech\Model\Entity\User;
use Altech\Model\Repository\UserRepository;
use App\Component\Controller;
use App\KernelFoundation\Request;
use App\KernelFoundation\Security;
use Exception;


class ClientController extends Controller
{
    public function index()
    {
        /** @var UserRepository $repo */
        $repo = $this->getRepository(UserRepository::class);

        return $this->render('/client/index.php', [
            'clients' => $repo->findAllByRole(Security::ROLE_CLIENT)
        ]);
    }

    public function create()
    {
        $error = "";
        $req = $this->getRequest();

        if ($req->is(Request::METHOD_POST)) {
            $form = $req->form;
            $file = $req->files->get("cgu_approvement");

            if (!empty($form->get("name")) && !empty($form->get("email")) && !empty($file)) {
                $repo = $this->getRepository(UserRepository::class);
                $client = (new User())
                    ->setRole(Security::ROLE_CLIENT)
                    ->setName($form->get("name"))
                    ->setPhone($form->get("phone"))
                    ->setAddress($form->get("address"))
                    ->setCity($form->get("city"))
                    ->setZipCode($form->get("zipcode"))
                    ->setEmail($form->get("email"));

                $client->setCguApprovement($this->checkAndUploadFile($file));
                $repo->insert($client);
            }
        }
        return $this->render('/client/form.php', [
            'title' => "Création d'un nouveau client :",
            'client' => $client,
            'error' => $error
        ]);
    }


    public function edit($id)
    {
        $error = "";
        $req = $this->getRequest();
        $repo = $this->getRepository(UserRepository::class);
        /** @var User $client */
        $client = $repo->findById($id);

        if ($client) {
            if ($req->is(Request::METHOD_POST)) {
                $form = $req->form;
                $file = $req->files->get("cgu_approvement");

                if (!empty($form->get("name")) && !empty($form->get("email")) && !empty($file)) {
                    $client = $client
                        ->setName($form->get("name"))
                        ->setPhone($form->get("phone"))
                        ->setAddress($form->get("address"))
                        ->setCity($form->get("city"))
                        ->setZipCode($form->get("zipcode"))
                        ->setEmail($form->get("email"));

                    $client->setCguApprovement($this->checkAndUploadFile($file));
                    $repo->update($client);
                }
            }
            return $this->render('/client/form.php', [
                'title' => "Modification du client $id:",
                "client" => $client,
                'error' => $error
            ]);
        }
        throw new Exception("invalid client id: $id");
    }

    public function delete($id)
    {
        $repo = $this->getRepository(UserRepository::class);
        $client = $repo->findById($id);

        // We check that the user exists and that he isn't trying to delete his account by himself
        if ($client) {
            $repo->remove($client);
            $this->redirect("/admin/client");
        }
        throw new Exception("invalid user id: $id");
    }

    private function checkAndUploadFile($file): string
    {
        $metadata = pathinfo($file['name']);
        if (in_array($metadata['extension'], ['pdf', 'doc', 'docx', 'jpeg', 'png'])) {
            $uploadPath = User::UPLOAD_DIR . bin2hex(random_bytes(20)) . '.pdf';
            if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
               return $uploadPath;
            } else {
                throw new Exception("Erreur d'upload du fichier");
            }
        }
    }
}