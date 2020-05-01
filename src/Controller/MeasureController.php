<?php


namespace Altech\Controller;

use Altech\Model\Repository;
use Altech\Model\Entity\Measure;
use Altech\Model\Repository\MeasureRepository;
use Altech\Model\Repository\CandidateRepository;
use App\KernelFoundation\Request;
use App\Component\Controller;


use Exception;

class MeasureController extends Controller
{
    public function candidatePanel($id){
        /** @var MeasureRepository $repo */
        $repo = $this->getRepository(MeasureRepository::class);
        $candidate = $this->getUser()->getCandidateById($id);

        return $this->render('/measures/candidate.php', [
            'title' => 'Gérer les mesures',
            'measures' => $repo->findAllByCandidate($candidate)
        ]);
    }
    
    
    public function init(){
        return  $this->render('/client/newmeasure.php');
    }
    

    public function create()
    {
        $error = "";
        $req = $this->getRequest();

        if ($req->is(Request::METHOD_POST)){
            $form = $req->form;
            
            if(!empty($form->get("set")) && !empty($form->get("client_id")) && !empty($form->get("candidate_id"))){
                $repo = $this->getRepository(MeasureRepository::class);
                $set = $form->get("set");
                $candidate = $this->getUser()->getCandidateById($form->get("candidate_id"));
                $measure = (new Measure())
                    ->setCandidate($candidate)
                    ->setCandidate_id($candidate->getId())
                    ->setDate_measured(date('YYYY-MM-DD'));
                    

                //Making the measures (also see Set entity)
                foreach($set as $key=>$value){
                    switch($value){
                       case 0:
                        $measure->setHeartBeat(Measure::getValue());
                       break;
                       case 1:
                        $measure->setTemperature(Measure::getValue());
                       break;
                       case 2:
                        $measure->setConductivity(Measure::getValue());
                       break;
                       case 3:
                        $measure->setVisualUnexpectedReflex(Measure::getValue());
                       break;
                       case 4:
                        $measure->setVisualExpectedReflex(Measure::getValue());
                       break;
                       case 5:
                        $measure->setSoundUnexpectedReflex(Measure::getValue());
                       break;
                       case 6:
                        $measure->setSoundExpectedReflex(Measure::getValue());
                       break;
                       case 7:
                        $measure->setTonalityRecognition(Measure::getValue());
                       break;
                    }

                    $repo->insert($measure);
                    //TODO : redirect
                }
            }

            //TODO : return
        }
    }     
    
}