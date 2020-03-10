<?php

namespace App\KernelFoundation;

class Response
{

    private $status_code;
    private $content;
    private $params;
    private $headers;

    public function __construct(array $params = [], int $status_code = 200, $headers = [])
    {
        $this->status_code = $status_code;
        $this->params = $params;
        $this->headers = $headers;
    }


    public function send()
    {
        $this
            ->sendHeaders()
            ->sendContent();
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    private function sendHeaders(): self
    {
        // headers have already been sent by the developer
        if (!headers_sent()) {
            foreach ($this->headers as $header => $value) {
                header($header . ': ' . $value, true, $this->status_code);
            }
        }
        return $this;
    }

    private function sendContent(): self
    {
        echo $this->content;
        return $this;
    }

    public function addHeader($name, $value)
    {
        $this->headers[$name] = $value;
    }

    public function setHeaders(array $headers): self
    {
        $this->headers = $headers;
        return $this;
    }
}