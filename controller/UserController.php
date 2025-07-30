<?php

namespace Debian\Approute\controller;

use Debian\Approute\http\Response;
use Debian\Approute\http\Request;

class UserController
{
    public static function index(Request $request, Response $response)
    {
        return $response->text('hello world')->send();
    }

    public static function user(Request $request, Response $response) {}
}
