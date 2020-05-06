<?php
namespace Altech\Model\Entity;

use App\KernelFoundation\Security;

class User implements EntityInterface
{
    const UPLOAD_DIR = __DIR__."/../../../public/upload/";
    const PICTURE_DIR = __DIR__."/../../../public/img/user/";

    private $id;
    private $name;
    private $email;
    private $phone;
    private $recoverToken;
    private $password;
    private $role = "ROLE_CLIENT";
    private $picture;

    private $address;
    private $city;
    private $zipcode;

    private $legalrepresentative_firstname;
    private $legalrepresentative_lastname;
    private $legalrepresentative_email;
    private $legalrepresentative_phone;

    private $cgu_approvement;

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
  
  
    public function getPassword(): string
    {
      return $this->password;    
    }
  
    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }


    public function getRecoverToken(): ?string
    {
        return $this->recoverToken;
    }
   
    public function setRecoverToken(string $recoverToken): self
    {
        $this->recoverToken = $recoverToken;
        return $this;
    }


    public function getRole(): string
    {
        return $this->role;
    }

    public function getReadableRole(): string
    {
        switch ($this->role){
            case Security::ROLE_ADMIN:
                return "Administrateur";
            case Security::ROLE_CLIENT:
                return "Client";
            case Security::ROLE_SUPER_ADMIN:
                return "Super-Admin";
            default:
                return "Unknown";
        }
    }

    public function setRole(string $role): self
    {
        $this->role = $role;
        return $this;
    }
    
  
    public function getName(): ?string
    {
      return $this->name;
    }
  

    public function setName(string $name): self
    {
        $this->name = $name;
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;
        return $this;
    }  
  
    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;
        return $this;
    }


    public function getZipCode(): ?int
    {
        return $this->zipcode;
    }

    public function setZipCode(int $zipcode): self
    {
        $this->zipcode = $zipcode;
        return $this;
    }


    public function getRepresentativeFirstName(): ?string
    {
        return $this->legalrepresentative_firstname;
    }

    public function setRepresentativeFirstName(string $firstname): self
    {
        $this->legalrepresentative_firstname = $firstname;
        return $this;
    }


    public function getRepresentativeLastName(): ?string
    {
        return $this->legalrepresentative_lastname;
    }

    public function setRepresentativeLastName(string $lastname): self
    {
        $this->legalrepresentative_lastname = $lastname;
        return $this;
    }


    public function getRepresentativeEmail(): ?string
    {
        return $this->legalrepresentative_email;
    }

    public function setRepresentativeEmail(string $email): self
    {
        $this->legalrepresentative_email = $email;
        return $this;
    }


    public function getRepresentativePhone(): ?int
    {
        return $this->legalrepresentative_phone;
    }

    public function setRepresentativePhone(int $phone): self
    {
        $this->legalrepresentative_phone = $phone;
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

    public function getPicture(): ?string
    {
        return "/img/user/" . ($this->picture ?? "default.svg");
    }

    public function getPictureFile(): ?string
    {
        return ($this->picture ?? "default.svg");
    }

    public function setPictureFile(string $picture): self
    {
        $this->picture = $picture;
        return $this;
    }


}