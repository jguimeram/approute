<?php

namespace Debian\Approute\http;

use Debian\Approute\http\ResponseInterface;

class Response implements ResponseInterface
{

    private int $code = 200;
    private string $content;
    private array $header = [];

    public function setCode(int $num): self
    {
        $this->code = $num;
        http_response_code($this->code);
        return $this;
    }

    public function setBody(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function setHeader(array $header): self
    {
        $this->header = $header;
        foreach ($this->header as $key => $value) {
            header("$key: $value");
        }
        return $this;
    }


    public function text(string $text): self
    {
        $this->setHeader(['Content-Type' => 'text/plain']);
        $this->setBody($text);
        return $this;
    }

    public function html(string $html): self
    {
        $this->setHeader(['Content-Type' => 'text/html']);
        $this->setBody($html);
        return $this;
    }

    public function json(array $json): self
    {
        $this->setHeader(['Content-Type' => 'application/json']);
        $this->setBody(json_encode($json));
        return $this;
    }


    public function send(): void
    {
        http_response_code($this->code);
        foreach ($this->header as $key => $value) {
            header("$key: $value");
        }
        echo $this->content;
    }
}
