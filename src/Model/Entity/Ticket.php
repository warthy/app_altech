<?php
namespace Altech\Model\Entity;

use DateTime;

class Ticket implements EntityInterface
{
    private $id;
    private $closed;
    private $subject;
    private $description;
    private $open_at;
    private $admin_id;
    private $client_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function isClosed(): bool
    {
        return $this->closed;
    }

    public function setClosed(bool $closed): self
    {
        $this->closed = $closed;
        return $this;
    }


    public function getOpenAt(): ?DateTime
    {
        return new DateTime($this->open_at);
    }

    public function setOpenAt(DateTime $open_at): self
    {
        $this->open_at = $open_at;
        return $this;
    }


    public function getAdminId(): ?int
    {
        return $this->admin_id;
    }

    public function setAdminId(int $id): self
    {
        $this->admin_id = $id;
        return $this;
    }

    public function getClientId(): ?int
    {
        return $this->client_id;
    }

    public function setClientId($id): self
    {
        $this->client_id = $id;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription($description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }


    public function setSubject(string $subject): self
    {
        $this->subject = $subject;
        return $this;
    }

    public function getState(): string
    {
        if($this->admin_id){
            if(!$this->closed)
                return 'Résolu';
            return 'En cours de résolution';
        }
        return 'Non attribué';
    }

}