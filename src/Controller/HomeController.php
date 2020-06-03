<?php


namespace Altech\Controller;


use App\Component\Controller;
use App\KernelFoundation\Request;
use App\KernelFoundation\Security;
use Exception;

class HomeController extends Controller
{
    public function index()
    {
        $user = $this->getUser();
        if ($user){
            if(Security::hasPermission(Security::ROLE_ADMIN)){
                return  $this->render("/dashboard/admin.php", [
                    "title" => "Dashboard admin",
                    "clients" => 12,
                    "candidates" => 45,
                    "tests" => 1000,
                    "admins" => 7
                ]);
            }

            return  $this->render("/dashboard/client.php", [
                "title" => "Dashboard client",
                "candidates" => 45,
                "tests" => 1000,
                "score" => 15.20
            ]);
        }


        return $this->render("/landing-page.php", [], null, false);
    }

    public function contact()
    {
        $req = $this->getRequest();
        if ($req->is(Request::METHOD_POST)) {
            $form = $req->form;

            $mailer = $this->getMailer();
            try {
                $mailer
                    ->from($form->get('email'), $form->get('name'))
                    ->to($_ENV["MAILER_USERNAME"])
                    ->subject('Demande de contact: ' . $form->get('name'))
                    ->setBody('contact.php', [
                        'name' => $form->get('name'),
                        'email' => $form->get('email'),
                        'message' => $form->get('message')
                    ]);

                $mailer->send();
            } catch (Exception $e) {
                die(var_dump($e));
                //TODO: handle Exception
            }
        }
        $this->redirect("/");
    }
}