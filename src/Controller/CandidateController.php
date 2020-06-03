<?php
namespace Altech\Controller;

use Altech\Model\Entity\Candidate;
use Altech\Model\Repository\CandidateRepository;
use App\Component\Controller;
use App\KernelFoundation\Request;
use Exception;
use PDO;

class CandidateController extends Controller
{
    
    public function index(){
        $filter = $this->getRequest()->get->get("search") ?? "";
        $page = $this->getRequest()->get->get("page") ?? 0;

        /** @var CandidateRepository $repo */
        $repo = $this->getRepository(CandidateRepository::class);
        return $this->render('/candidate/index.php', [
            'title' => 'Gestion des candidats',
            'candidates' => $repo->findCandidatesWithFilter($this->getUser()->getId(), $filter, $page),
            'page' => $page+1,
            'count' => $repo->findPageCountWithFilter($this->getUser()->getId(), $filter)+1,
            'filter' => $filter
        ]);
    }

    public function findByName(string $name){
        // TODO :implement findByEmail function
    }

    

    public function create(){
        $req = $this->getRequest();
        $file = $req->files->get("cgu_approvement");
        $form = $req->form;

        if($req->is(Request::METHOD_POST)){

            if(!empty($form->get("firstname")) && !empty($form->get("lastname")) && !empty($form->get("email"))){
                $repo = $this->getRepository(CandidateRepository::class);

                $candidate = (new Candidate())
                    ->setClientId($this->getUser()->getId())
                    ->setEmail($form->get("email"))
                    ->setPhone($form->get("phone"))
                    ->setFirstname($form->get("firstname"))
                    ->setLastname($form->get("lastname"))
                    ->setHeight($form->get("height"))
                    ->setWeight($form->get("weight"));
                if(intval($form->get("sex")) >= 0){
                    $candidate->setSex(intval($form->get("sex")));
                }else {
                    $candidate->setSex(null);
                }
                   

                $candidate->setCguApprovement(ClientController::checkAndUploadFile($file));

                $repo->insert($candidate);
                $this->redirect("/candidate/".$candidate->getId());
            }
        }

        return $this->render('/candidate/form.php', [
            "title" => "Création d'un nouveau candidat",
            "candidate" => new Candidate()
        ]);
    }


    public function edit($id)
    {
        $repo = $this->getRepository(CandidateRepository::class);
        $user = $this->getUser();
        /** @var Candidate $candidate */
        $candidate = $repo->findById($id);
        $req = $this->getRequest();
        $file = $req->files->get("cgu_approvement");
        $form = $req->form;

        if($candidate && $user->getId() == $candidate->getClientId()){
            if($req->is(Request::METHOD_POST)) {
                $candidate
                    ->setEmail($form->get("email"))
                    ->setPhone($form->get("phone"))
                    ->setFirstname($form->get("firstname"))
                    ->setLastname($form->get("lastname"))
                    ->setHeight($form->get("height"))
                    ->setWeight($form->get("weight"));
                if (intval($form->get("sex")) >= 0) {
                    $candidate->setSex(intval($form->get("sex")));
                } else {
                    $candidate->setSex(null);
                }

                if($file){
                    $candidate->setCguApprovement(ClientController::checkAndUploadFile($file));
                }
                $repo->update($candidate);
                $this->redirect("/candidate/".$candidate->getId());
            }

            return $this->render('/candidate/form.php', [
                "title" => "Candidat: ". $candidate->getFirstname().' '.strtoupper($candidate->getLastname()),
                "candidate" => $candidate
            ]);
        }
        throw new Exception("invalid candidate id: $id");
    }
}