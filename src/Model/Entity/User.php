<?php
namespace Altech\Model\Entity;

class User implements EntityInterface
{
    const UPLOAD_DIR = __DIR__."/../../../public/upload/";

    private $id;
    private $name;
    private $email;
    private $phone;
    private $recoverToken;
    private $password;
    private $role = "ROLE_CLIENT";

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

    public function setRecoverToken(string $recoverToken): void
    {
        $this->recoverToken = $recoverToken;
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

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;
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