<?php

namespace Altech\Controller;

use Altech\Model\Entity\FAQ;
use Altech\Model\Repository\FAQRepository;
use App\Component\Controller;
use App\KernelFoundation\ParameterBag;
use App\KernelFoundation\Request;
use Exception;
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


    function edit(int $id)
    {
        /* @var FAQRepository */
        $rep = $this->getRepository(FAQRepository::class);
        /** @var FAQ $faq */
        $faq = $rep->findById($id);

        if($faq){
            $req = $this->getRequest();
            // If request is post then form has been submitted
            if($req->is(Request::METHOD_POST)){

                $form = $req->form;
                if(!empty($form->get('answer')) && !empty($form->get('question'))){
                    $repository = $this->getRepository(FAQRepository::class);

                    $faq->setAnswer($form->get('answer'));
                    $faq->setQuestion($form->get('question'));

                    $repository->update($faq);
                    $this->redirect('/faq/'.$faq->getId());
                }
            }


            return $this->render('/faq/form.php', [
                    "title" => "Question $id",
                    "faq" => $faq]
            );
        }
        throw new Exception("invalid faq id: $id");
    }

    function create(){
        $req = $this->getRequest();

        // If request is post then form has been submitted
        if($req->is(Request::METHOD_POST)){

            $form = $req->form;
            if(!empty($form->get('answer')) && !empty($form->get('question'))){
                $repository = $this->getRepository(FAQRepository::class);

                $faq = new FAQ();
                $faq->setAnswer($form->get('answer'));
                $faq->setQuestion($form->get('question'));

                $repository->insert($faq);
                $this->redirect('/faq/'.$faq->getId());
            }
        }

        return $this->render('/faq/form.php', [
                "title" => "Nouvelle question",
                "faq" => new FAQ()]
        );
    }

    function delete($id){
        /* @var FAQRepository */
        $rep = $this->getRepository(FAQRepository::class);
        /** @var FAQ $faq */
        $faq = $rep->findById($id);

        // We check that the faq exists then we delete it
        if($faq){
            $rep->remove($faq);
            $this->redirect("/faq");
        }

        throw new Exception("invalid faq id: $id");
    }
}