<?php
namespace Altech\Model\Entity;

use DateTime;

use Altech\Model\Entity\Candidate;
use Altech\Model\Entity\EntityInterface;

class Measure implements EntityInterface
{
    private $id;

    private $conductivity;
    private $date_measured;
    private $heartbeat;
    private $sound_expected_reflex;
    private $sound_unexpected_reflex;
    private $visual_expected_reflex;
    private $visual_unexpected_reflex;
    private $temperature;
    private $tonality_recognition;

    private $candidate;
    private $candidate_id;
    private $client;
    private $client_id;

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setConductivity(int $conductivity): self
    {
        $this->conductivity = $conductivity;
        return $this;
    }

    public function getConductivity(): ?float
    {
        return $this->conductivity;
    }

    public function setHeartBeat(float $heartbeat): self
    {
        $this->hearbeat = $heartbeat;
        return $this;
    }

    public function getHeartBeat(): ?float
    {
        return $this->heartbeat;
    }

    public function setTemperature(float $temperature): self
    {
        $this->temperature = $temperature;
        return $this;
    }

    public function getTemperature(): ?float
    {
        return $this->temperature;
    }
    
    public function setVisualUnexpectedReflex(float $visual_unexpected_reflex): self
    {
        $this->visual_unexpected_reflex = $visual_unexpected_reflex;
        return $this;
    }

    public function getVisualUnexpectedReflex(): ?float
    {
        return $this->visual_unexpected_reflex;
    }

    public function setVisualExpectedReflex(float $visual_expected_reflex): self
    {
        $this->visual_expected_reflex = $visual_expected_reflex;
        return $this;
    }

    public function getVisualExpectedReflex(): ?float
    {
        return $this->visual_expected_reflex;
    }

    public function setSoundUnexpectedReflex(float $sound_unexpected_reflex): self
    {
        $this->sound_unexpected_reflex = $sound_unexpected_reflex;
        return $this;
    }

    public function getSoundUnexpectedReflex(): ?float
    {
        return $this->sound_unexpected_reflex;
    }


    public function setSoundExpectedReflex(float $sound_expected_reflex): self
    {
        $this->sound_expected_reflex = $sound_expected_reflex;
        return $this;
    }

    public function getSoundExpectedReflex(): ?float
    {
        return $this->sound_expected_reflex;
    }

    public function setTonalityRecognition(float $tonality_recognition): self
    {
        $this->tonality_recognition = $tonality_recognition;
        return $this;
    }

    public function getTonalityRecognition(): ?float
    {
        return $this->tonality_recognition;
    }


    /**
     * Get the value of date_measured
     */ 
    public function getDate_measured(): ?string
    {
        $originalDate = $this->date_measured;
        return date("d/m/Y à h:i", strtotime($originalDate));
    }

    /**
     * Set the value of date_measured
     *
     * @return  self
     */ 
    public function setDate_measured($date_measured): self
    {
        $this->date_measured = $date_measured;

        return $this;
    }

    /**
     * Get the value of candidate_id
     */ 
    public function getCandidate_id(): ?int
    {
        return $this->candidate_id;
    }

    /**
     * Set the value of candidate_id
     *
     * @return  self
     */ 
    public function setCandidate_id(int $candidate_id): self
    {
        $this->candidate_id = $candidate_id;

        return $this;
    }


    public function getCandidate(): ?Candidate
    {
        return $this->candidate;
    }

    public function setCandidate(Candidate $candidate): self
    {
        $this->candidate = $candidate;
        return $this;
    }

    
    /**
     * Get the value of the measure
     */
    public static function getValue(): ?float
    {
        return 0;
    }


    /**
     * Get the value of client
     */ 
    public function getClient(): ?User
    {
        return $this->client;
    }

    /**
     * Set the value of client
     *
     * @return  self
     */ 
    public function setClient($client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get the value of client_id
     */ 
    public function getClient_id(): ?int
    {
        return $this->client_id;
    }

    /**
     * Set the value of client_id
     *
     * @return  self
     */ 
    public function setClient_id($client_id): self
    {
        $this->client_id = $client_id;

        return $this;
    }
}