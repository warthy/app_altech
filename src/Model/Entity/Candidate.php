<?php
namespace Altech\Model\Entity;

use DateTime;

class Candidate implements EntityInterface
{
    private $id;
    private $email;
    private $phone;
    private $firstname;
    private $lastname;
    private $height;
    private $weight;
    private $sex;
    private $birthdate;
    private $cgu_pprovement;


    private $client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function setHeight(float $height): self
    {
        $this->height = $height;
        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): self
    {
        $this->weight = $weight;
        return $this;
    }

    public function getSex(): ?bool
    {
        return $this->sex;
    }

    public function setSex(bool $sex): self
    {
        $this->sex = $sex;
        return $this;
    }

    public function getBirthdate()
    {
        return $this->birthdate;
    }


    public function setBirthdate(DateTime $birthdate): self
    {
        $this->birthdate = $birthdate;
        return $this;
    }

   
    public function getClient(): User
    {
        return $this->client;
    }

    public function setClient(User $client): self
    {
        $this->client = $client;
        return $this;
    }

    public function getCguApprovement(): ?string
    {
        return $this->cgu_approvement;
    }


    public function setCguApprovement(string $cgu_approvement): self
    {
        $this->cgu_approvement = $cgu_approvement;
        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;
        return $this;
    }


}