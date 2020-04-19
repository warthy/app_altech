<?php

namespace Altech\Controller;

use Altech\Model\Entity\User;
use Altech\Model\Repository\UserRepository;
use App\Component\Controller;
use App\KernelFoundation\Request;
use App\KernelFoundation\Security;


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
                $client = (new User())
                    ->setRole(Security::ROLE_CLIENT)
                    ->setName($form->get("name"))
                    ->setPhone($form->get("phone"))
                    ->setAddress($form->get("address"))
                    ->setCity($form->get("city"))
                    ->setZipCode($form->get("zipcode"))
                    ->setEmail($form->get("email"));

                $metadata = pathinfo($file['name']);
                if (in_array($metadata['extension'], ['pdf', 'doc', 'docx', 'jpeg', 'png'])) {
                    $uploadPath = User::UPLOAD_DIR . bin2hex(random_bytes(20)) . '.pdf';
                    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                        $client->setCguApprovement($uploadPath);
                    } else {
                        echo "Possible file upload attack!\n";
                    }
                }

            }
        }
        return $this->render('/client/create.php', [
            'title' => "Création d'un nouveau client :",
            'error' => $error
        ]);
    }


}