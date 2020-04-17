<?php
namespace Altech\Controller;

use Altech\Model\Entity\User;
use Altech\Model\Repository\UserRepository;
use App\Component\Controller;
use App\KernelFoundation\Request;

class ClientController extends Controller
{r
    public function index(){
        return $this->render('/candidate/index.php');
    }

    public function create(){
        $error = "";
        $req = $this->getRequest();

        if($req->is(Request::METHOD_POST)){
            $form = $req->form;
            $file = $req->files->get("cgu_approvement");

            if(!empty($form->get("name")) && !empty($form->get("email")) && !empty($file)){
                $client = new User();
                $client
                    ->setRole()
                    ->setName($form->get("name"))
                    ->setEmail($form->get("email"));

                if(!mime_content_type($file[]) == "'application/pdf"){
                    $error = "File should be a pdf !";
                }else {

                }
            }
        }
        return $this->render('/client/create.php', [
           'error' => $error
        ]);
    }



}