<?php

namespace App\Middleware;

use App\Session\Session;

interface AuthenticatorInterface
{
    public function authenticate();

}