<?php

namespace Debian\Approute\http;

use  Debian\Approute\http\interfaces\RequestInterface;

class Request implements RequestInterface
{

    private string $method;
    private string $path;
    private array $post;
    private array $params;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->path = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
        echo $this->path;
        $this->post = $_POST ?? [];
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getPost(string $key): array|null
    {
        if ($key === null) return $this->post;
        return $this->post[$key] ?? null;
    }

    public function setParams(array $params){
        $this->params = $params;
    }

    public function getParams(): array{
        return $this->params;
    }
}
