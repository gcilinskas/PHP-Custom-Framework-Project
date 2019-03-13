<?php

namespace App\Validation\Auth;

use Valitron\Validator;
use App\Session\Session;
use App\Validation\Validation;
use Doctrine\ORM\EntityManager;

class LoginValidation extends Validation
{
    public function validate()
    {
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];

        $validation = new Validation($this->request,$this->response,$rules);
        if($validation->validator()){
            return true;
        }

        return;
    }

    public function checkLogin(EntityManager $em)
    {

        $user = $em->getRepository('App\Models\User')->findByEmail(get('email'));


        if(!isset($user[0]) || !password_verify(get('password'),$user[0]->getPassword())  ) {
            $errors = [ 'database' => 'Wrong email or password' ];
            $old = ['email' => get('email')];
            Session::set('errors',$errors);
            Session::set('old',$old);
            return false;
        }
    
        return true;
    }



}