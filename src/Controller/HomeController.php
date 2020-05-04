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
        return $user ?
            $this->render("/dashboard/index.php", []) :
            $this->render("/landing-page.php", [], null, false);
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
                    ->to("venard.paul@gmail.com")                                       //TODO: change email
                    ->subject('Demande de contact: ' . $form->get('name'))
                    ->setBody('contact.php', ['message' => $form->get('message')]);

                $mailer->send();
            } catch (Exception $e) {
                die(var_dump($e));
                //TODO: handle Exception
            }
        }
        return $this->render("/landing-page.php", [], null, false);
    }
}