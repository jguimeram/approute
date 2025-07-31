<?php

namespace Debian\Approute\controller;

use Debian\Approute\http\Response;
use Debian\Approute\http\Request;

class UserController
{
    public static function index(Request $request, Response $response)
    {
        return ["user" => "name", "status" => "ok"];
    }

    public static function user(Request $request, Response $response) {}
}
