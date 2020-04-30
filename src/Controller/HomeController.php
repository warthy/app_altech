<?php


namespace Altech\Controller;


use App\Component\Controller;
use App\KernelFoundation\Security;

class HomeController extends Controller
{
    public function index(){
        $user = $this->getUser();
        if($user){
            switch ($user->getRole()){
                case Security::ROLE_ADMIN:
                case Security::ROLE_SUPER_ADMIN:
                    $this->redirect('/admin');
                    break;
                case Security::ROLE_CLIENT:
                default:
                    $this->redirect('/client');
                    break;
            }
        }
        return $this->render("/landing-page.php", [], null, false);
    }

    public function dashboard(){
        return $this->render("/dashboard/index.php", []);
    }
}