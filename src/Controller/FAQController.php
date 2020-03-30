<?php

namespace Altech\Controller;

use Altech\Model\Repository\FAQRepository;
use App\Component\Controller;
use App\KernelFoundation\Request;

class FAQController extends Controller
{
    function index()
    {
        /* @var FAQRepository */
        $rep = $this->getRepository(FAQRepository::class);

        return $this->render('/faq/index.php', [
            "admin" => true,
            "title" => "Foire aux questions",
            "faqs" => $rep->findAllQuestions()]
        );
    }

    function create(){
        $req = $this->getRequest();

        // If request is post then form has been submitted
        if($req->is(Request::METHOD_POST)){



        }

        return $this->render('', []);
    }
}