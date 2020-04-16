<?php
namespace Altech\Controller;

use App\Component\Controller;

class CandidateController extends Controller
{
    public function listCandidate(){
        $this->getRequest()->get->get("page");

    }
}