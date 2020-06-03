<?php


namespace Altech\Controller;

use Altech\Model\Entity\Candidate;
use Altech\Model\Repository;
use Altech\Model\Entity\Measure;
use Altech\Model\Repository\CandidateRepository;
use Altech\Model\Repository\MeasureRepository;
use App\KernelFoundation\Request;
use App\Component\Controller;
use App\KernelFoundation\Security;



use Exception;

class MeasureController extends Controller
{
    public function index(){
        $req = $this->getRequest();
        $form = $req->form;
        /** @var MeasureRepository $measureRepo */
        $measureRepo = $this->getRepository(MeasureRepository::class);
        /** @var CandidateRepository $candidateRepo */
        $candidateRepo = $this->getRepository(CandidateRepository::class);

        if(!empty($form->get("name"))){
            /** @var Candidate $candidate */
            $candidate = $candidateRepo->findByName($form->get("name"));
            $candidate_id = $candidate->getId();
        }
        
        return $this->render('/measures/index.php',[
            'title' => 'Gestion des mesures',
            'measures' => !empty($form->get("name")) ? $measureRepo->findAllByCandidateId($candidate_id) : $measureRepo->findAllOfUser($this->getUser()),
            'candidateRepo' => $candidateRepo
        ]);
    }
    
    
    public function candidatePanel($id){
        /** @var MeasureRepository $measureRepo */
        $measureRepo = $this->getRepository(MeasureRepository::class);
        /** @var CandidateRepository $candidateRepo */
        $candidateRepo = $this->getRepository(CandidateRepository::class);
        /** @var Candidate $candidate */
        $candidate = $candidateRepo->findById($id);
        $measures = $measureRepo->findAllByCandidateId($id);
        
        // TODO : verify if measures belong to candidate ?
        if($measures){
            $user = $this->getUser();
            if(($candidate && $candidate->getClientId() === $user->getId()) || Security::hasPermission(Security::ROLE_ADMIN))
            {
                return $this->render('/measures/candidate-index.php', [
                    'title' => 'Gérer les mesures du candidat : ' . $candidate->getFirstName() . ' ' . $candidate->getLastName(),
                    'candidate_id' => $id,
                    'measures' => $measures
                ]);
            }
        }
        
    }

    public function view($id){
        /** @var MeasureRepository $measureRepo */
        $measureRepo = $this->getRepository(MeasureRepository::class);
        /** @var CandidateRepository $candidateRepo */
        $candidateRepo = $this->getRepository(CandidateRepository::class);
        /** @var Measure $measure */
        $measure = $measureRepo->findById($id);
        /** @var Candidate $candidate */
        $candidate = $candidateRepo->findById($measure->getCandidate_id());

        if ($measure){
            $user = $this->getUser();
            if(($candidate && $candidate->getClientId() === $user->getId()) || Security::hasPermission(Security::ROLE_ADMIN))
            {
                return $this->render('/measures/view.php',[
                    'title' => 'Mesure n° : ' . $measure->getId(),
                    'candidate' => $candidate,
                    'measure' => $measure
                ]);
            }
        }
    }
    

    
    public function init(){
        $req = $this->getRequest();
        $form = $req->form;
        /** @var CandidateRepository $candidateRepo */
        $candidateRepo = $this->getRepository(CandidateRepository::class);
        $candidates = $candidateRepo->findAllOfUser($this->getUser());
        
        
        return  $this->render('/measures/form.php',[
            'title' => 'Nouvelle mesure',
            'candidates' => $candidates
        
        ]);
    }
    

    public function create()
    {
        $req = $this->getRequest();

        if ($req->is(Request::METHOD_POST)){
            $form = $req->form;

            if(!empty($form->get("candidate") && !empty($form->get("set")))){
                /** @var MeasureRepository $measureRepo */
                $measureRepo = $this->getRepository(MeasureRepository::class);
                /** @var CandidateRepository $candidateRepo */
                $candidateRepo = $this->getRepository(CandidateRepository::class);

                $candidate = $candidateRepo->findById($form->get("candidate"));
                $set = $form->get("set");

                $measure = (new Measure())
                    ->setCandidate($candidate)
                    ->setCandidate_id($candidate->getId())
                    ->setClient($this->getUser())
                    ->setClient_id($this->getUser()->getId())
                    ->setDate_measured(date("Y-m-d H:i:s"));
                    
                    
                    if(in_array("heartbeat", $set) && !empty($form->get("heartbeat-results-value"))){
                        $measure->setHeartBeat($form->get("heartbeat-results-value"));
                    }
                    if(in_array("temperature", $set) && !empty($form->get("temperature-results-value"))){
                        $measure->setTemperature((float)$form->get("temperature-results-value"));
                    }
                    if(in_array("conductivity", $set) && !empty($form->get("conductivity-results-value"))){
                        $measure->setConductivity((float)$form->get("conductivity-results-value"));
                    }
                    if(in_array("visual_unexpected_reflex", $set) && !empty($form->get("visual_unexpected_reflex-results-value"))){
                        $measure->setVisualUnexpectedReflex((float)$form->get("visual_unexpected_reflex-results-value"));
                    }
                    if(in_array("visual_expected_reflex", $set) && !empty($form->get("visual_expected_reflex-results-value"))){
                        $measure->setVisualExpectedReflex((float)$form->get("visual_expected_reflex-results-value"));
                    }
                    if(in_array("sound_unexpected_reflex", $set) && !empty($form->get("sound_unexpected_reflex-results-value"))){
                        $measure->setSoundUnexpectedReflex((float)$form->get("sound_unexpected_reflex-results-value"));
                    }
                    if(in_array("sound_expected_reflex", $set) && !empty($form->get("sound_expected_reflex-results-value"))){
                        $measure->setSoundExpectedReflex((float)$form->get("sound_expected_reflex-results-value"));
                    }
                    if(in_array("tonality_recognition", $set) && !empty($form->get("tonality_recognition-results-value"))){
                        $measure->setTonalityRecognition((float)$form->get("tonality_recognition-results-value"));
                    }
                                        
                    
                    //$measureRepo->insert($measure);
                    //$this->redirect('/measures/measure/'.$measure->getId());
                    
            }
            
        }
        return $this->render('/measures/measure.php', [
            "title" => "Mesure : " . $candidate->getLastName(). ' ' . $candidate->getFirstName(),
            "candidate" => $candidate,
            "set" => $set,
            "measure" => new Measure()
        ]);
    }     
    
}