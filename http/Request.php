<?php

namespace Debian\Approute\http;

class Request
{

    private string $method;
    private string $path;
    private array $post;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
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
}
