<?php


namespace Altech\Controller;


use App\Component\Controller;

class HomeController extends Controller
{
    public function index(){
        return $this->render("/landing-page.php", [], null, false);
    }

    public function dashboard(){
        return $this->render("/dashboard/index.php", []);
    }
}