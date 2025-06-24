<?php

namespace Debian\Approute\controller;

use Debian\Approute\http\Request;
use Debian\Approute\http\Response;

class UserController
{
    public static function index(Request $request, Response $response)
    {
        return $response->text('hello, world');
    }
}
