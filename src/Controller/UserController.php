<?php


namespace Altech\Controller;


use App\Component\Controller;

class UserController extends Controller
{
    public function profile() {
        return $this->render('/user/profile.php', [
            'title' => "Votre profil",
            'user' => $this->getUser(),
        ]);
    }


    public function edit(){

    }

    public function changePassword(){

    }
}