<?php


namespace Altech\Controller;

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
        /** @var MeasureRepository $measureRepo */
        $measureRepo = $this->getRepository(MeasureRepository::class);
        /** @var CandidateRepository $candidateRepo */
        $candidateRepo = $this->getRepository(CandidateRepository::class);

        
        return $this->render('/measures/index.php',[
            'title' => 'Gestion des mesures',
            'measures' => $measureRepo->findAllOfUser($this->getUser()),
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
        $error = "";
        $req = $this->getRequest();

        if ($req->is(Request::METHOD_POST)){
            $form = $req->form;
            
            if(!empty($form->get("set")) && !empty($form->get("candidate"))){
                /** @var MeasureRepository $measureRepo */
                $measureRepo = $this->getRepository(MeasureRepository::class);
                /** @var CandidateRepository $candidateRepo */
                $candidateRepo = $this->getRepository(CandidateRepository::class);
                $set = $form->get("set");
                $candidate = $candidateRepo->findById($form->get("candidate_id"));
                $measure = (new Measure())
                    ->setCandidate($candidate)
                    ->setCandidate_id($candidate->getId())
                    ->setClient($this->getUser())
                    ->setClient_id($this->getUser()->getId())
                    ->setDate_measured(date('YYYY-MM-DD'));
                    

                    if(!empty($form->get("hearthbeat"))){
                        $measure->setHeartBeat(Measure::getValue());
                    }
                    if(!empty($form->get("temperature"))){
                        $measure->setTemperature(Measure::getValue());
                    }
                    if(!empty($form->get("conductivity"))){
                        $measure->setConductivity(Measure::getValue());
                    }
                    if(!empty($form->get("visual_unexpected_reflex"))){
                        $measure->setVisualUnexpectedReflex(Measure::getValue());
                    }
                    if(!empty($form->get("visual_expected_reflex"))){
                        $measure->setVisualExpectedReflex(Measure::getValue());
                    }
                    if(!empty($form->get("sound_unexpected_reflex"))){
                        $measure->setSoundUnexpectedReflex(Measure::getValue());
                    }
                    if(!empty($form->get("sound_expected_reflex"))){
                        $measure->setSoundExpectedReflex(Measure::getValue());
                    }
                    if(!empty($form->get("tonality_recognition"))){
                        $measure->setTonalityRecognition(Measure::getValue());
                    }
                    

                    $measureRepo->insert($measure);
                    //TODO : redirect
            }
            

            //TODO : return
        }
    }     
    
}