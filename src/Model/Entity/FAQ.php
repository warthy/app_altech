<?php
namespace Altech\Model\Entity;

class FAQ
{
    private $id;
    private $question;
    private $answer;

    public function getId(): int
    {
        return $this->id;
    }


    public function getQuestion(): string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;
        return $this;
    }


    public function getAnswer(): string
    {
        return $this->answer;
    }


    public function setAnswer(string $answer): self
    {
        $this->answer = $answer;
        return $this;
    }
}