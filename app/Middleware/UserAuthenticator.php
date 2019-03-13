<?php

namespace App\Middleware;

use App\Session\Session;
use App\Middleware\AuthenticatorInterface;

class UserAuthenticator implements AuthenticatorInterface
{

    public function authenticate()
    {
        if(Session::exists('user')) {
            return true;
        } else {
            return false;
        }
        
    }

}