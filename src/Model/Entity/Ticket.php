<?php
namespace Altech\Model\Entity;

use DateTime;

class Ticket implements EntityInterface
{
    private $id;
    private $closed = false;
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

    public function getClosed(): bool
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
        return $this->open_at;
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


}