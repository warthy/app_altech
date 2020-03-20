<?php

namespace Altech\Controller;

use App\Component\Controller;

class TicketController extends Controller
{
    public function index()
    {
        die('oui');
    }

    public function view($id)
    {

        return $this->render("/ticket/view.php", ["id" => $id]);
    }

}