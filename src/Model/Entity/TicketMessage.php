<?php
namespace Altech\Model\Entity;

use DateTime;

class TicketMessage implements EntityInterface
{
    private $id;
    private $ticket_id;
    private $author_id;
    private $message;
    private $sent_at;


    public function getId(): int
    {
       return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getTicketId(): ?int
    {
        return $this->ticket_id;
    }

    public function setTicketId(int $ticket_id): self
    {
        $this->ticket_id = $ticket_id;
        return $this;
    }


    public function getAuthorId(): ?int
    {
        return $this->author_id;
    }

    public function setAuthorId(int $author_id): self
    {
        $this->author_id = $author_id;
        return $this;
    }


    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function getSentAt(): ?DateTime
    {
        return $this->sent_at;
    }

    public function setSentAt(DateTime $sent_at): self
    {
        $this->sent_at = $sent_at;
        return $this;
    }
}