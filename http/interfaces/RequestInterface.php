<?php


namespace Debian\Approute\http\interfaces;

interface RequestInterface
{
    public function getMethod(): string;

    public function getPath(): string;

    public function getPost(string $key): array|null;
}
