<?php


namespace Altech\Controller;


use App\Component\Controller;

class MeasureController extends Controller
{
    public function init(){
        return  $this->render('/client/newmeasures.php');
    }

    
}