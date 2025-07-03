<?php


namespace Debian\Approute\http\interfaces;

interface ResponseInterface
{
    public function setCode(int $num): self;


    public function setBody(string $content): self;


    public function setHeader(array $header): self;


    /*  public function text(string $text): self;


    public function html(string $html): self;


    public function json(array $json): self; */

    public function content(mixed $args): self;



    public function send(): void;
}
