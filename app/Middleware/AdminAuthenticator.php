<?php

namespace App\Middleware;

use App\Session\Session;
use App\Middleware\AuthenticatorInterface;

class AdminAuthenticator implements AuthenticatorInterface
{

    public function authenticate()
    {
        if(Session::exists('user')){
            $user = Session::unserialize('user');
            if($user->getIsAdmin() == true) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
        
    }

}