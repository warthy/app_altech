<?php

namespace Altech\Controller;

use Altech\Model\Entity\User;
use App\Component\Controller;
use App\KernelFoundation\Request;

class ClientController extends Controller
{
    public function index()
    {
        return $this->render('/candidate/index.php');
    }

    public function create()
    {
        $error = "";
        $req = $this->getRequest();

        if ($req->is(Request::METHOD_POST)) {
            $form = $req->form;
            $file = $req->files->get("cgu_approvement");

            if (!empty($form->get("name")) && !empty($form->get("email")) && !empty($file)) {
                $client = new User();
                $client
                    ->setRole(SecurityController::ROLE_CLIENT)
                    ->setName($form->get("name"))
                    ->setEmail($form->get("email"));

                if (!mime_content_type($file['tmp_name']) == "'application/pdf") {
                    $error = "File should be a pdf !";
                }
                else if (move_uploaded_file($file['tmp_name'],User::UPLOAD_DIR . uniqid() . '.pdf')) {
                    die('oui');
                } else {
                    echo "Possible file upload attack!\n";
                }
            }
        }
        return $this->render('/client/create.php', [
            'error' => $error
        ]);
    }


}