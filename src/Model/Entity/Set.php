<?php

use Altech\Model\Entity\EntityInterface;

class Set implements EntityInterface
{
    public static $test = array("heartbeat"=>0, 
                                "temperature"=>1, 
                                "conductivity"=>2, 
                                "visual_unexpected_reflex"=>3, 
                                "visual_expected_reflex"=>4,
                                "sound_unexpected_reflex"=>5,
                                "sound_expected_reflex"=>6,
                                "tonality_recognition"=>7);

    private $set;

    
}