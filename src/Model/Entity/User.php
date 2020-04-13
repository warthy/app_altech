<?php
namespace Altech\Model\Entity;

class User implements EntityInterface
{
    private $id;
    private $email;
    private $recoverToken;
    private $password;
    private $role = "ROLE_CLIENT";

    public function getId(): int
    {
       return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
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


}