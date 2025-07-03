<?php

namespace Debian\Approute\factory;

use Debian\Approute\http\interfaces\ResponseInterface;

abstract class ResponseFactory
{

    public abstract function createResponse(): ResponseInterface;
}
