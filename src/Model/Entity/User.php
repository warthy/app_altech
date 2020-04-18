<?php
namespace Altech\Model\Entity;

class User implements EntityInterface
{
    private $id;
    private $recoverToken;
    private $password;
    private $role = "ROLE_CLIENT";

    //NEW CLIENT INFOS
    private $company_name;
    private $company_address;
    private $company_city;
    private $company_zipcode;
    private $company_email;
    private $company_phone;

    private $legalrepresentative_firstname;
    private $legalrepresentative_lastname;
    private $legalrepresentative_email;
    private $legalrepresentative_phone;

    private $cgu_approvement; //??
    private $candidates; //candidats ?


    public function getId(): int
    {
       return $this->id;
    }


    

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }


    public function getRecoverToken(): ?string
    {
        return $this->recoverToken;
    }

    public function setRecoverToken(string $recoverToken): void
    {
        $this->recoverToken = $recoverToken;
    }

    

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;
        return $this;
    }


    public function getCompanyName(): ?string
    {
        return $this->$company_name;
    }

    public function setCompanyName(string $name): self
    {
        $this->$company_name = $name;
        return $this;
    }


    public function getCompanyAddress(): ?string
    {
        return $this->$company_address;
    }

    public function setCompanyAddress(string $address): self
    {
        $this->$company_address = $address;
        return $this;
    }


    public function getCompanyEmail(): ?string
    {
        return $this->$company_email;
    }

    public function setCompanyEmail(string $email): self
    {
        $this->$company_email = $email;
        return $this;
    }


    public function getCompanyPhone(): ?int
    {
        return $this->$company_phone;
    }

    public function setCompanyPhone(int $phone): self
    {
        $this->$company_phone = $phone;
        return $this;
    }



    public function getCompanyCity(): ?string
    {
        return $this->$company_city;
    }

    public function setCompanyCity(string $city): self
    {
        $this->$company_city = $city;
        return $this;
    }


    public function getCompanyZipCode(): ?int
    {
        return $this->$company_zipcode;
    }

    public function setCompanyZipCode(int $zipcode): self
    {
        $this->$company_zipcode = $zipcode;
        return $this;
    }


    public function getRepresentativeFirstName(): ?string
    {
        return $this->$legalrepresentative_firstname;
    }

    public function setRepresentativeFirstName(string $firstname): self
    {
        $this->$legalrepresentative_firstname = $firstname;
        return $this;
    }


    public function getRepresentativeLastName(): ?string
    {
        return $this->$legalrepresentative_lastname;
    }

    public function setRepresentativeLastName(string $lastname): self
    {
        $this->$legalrepresentative_lastname = $lastname;
        return $this;
    }


    public function getRepresentativeEmail(): ?string
    {
        return $this->$legalrepresentative_email;
    }

    public function setRepresentativeEmail(string $email): self
    {
        $this->$legalrepresentative_email = $email;
        return $this;
    }


    public function getRepresentativePhone(): ?int
    {
        return $this->$legalrepresentative_phone;
    }

    public function setRepresentativePhone(int $phone): self
    {
        $this->$legalrepresentative_phone = $phone;
        return $this;
    }

    



}