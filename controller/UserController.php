<?php

namespace Debian\Approute\controller;

use Debian\Approute\http\Request;
use Debian\Approute\http\Response;

class UserController
{
    public static function index(Request $request, Response $response)
    {
        return ["name" => "Cristina", "status" => "MILF"];
    }

    public static function user(Request $request, Response $response) {}
}
