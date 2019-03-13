<?php

namespace App\Validation\Auth;

use Valitron\Validator;
use App\Session\Session;
use App\Validation\Validation;
use Doctrine\ORM\EntityManager;

class RegisterValidation extends Validation
{
    public function validate()
    {
        $rules = [
            'email' => [
                'required',
                'email'
            ],
            'password' =>[
                'required',
                ['lengthMin', 6],
                ['equals','confirmPassword']
            ],
            'confirmPassword' => [
                'required'
            ]
        ];

        $validation = new Validation($this->request,$this->response,$rules);
        if($validation->validator()){
            return true;
        }

        return;
    }

    public function checkRegister(EntityManager $em)
    {

        $user = $em->getRepository('App\Models\User')->findByEmail(get('email'));

        if(isset($user[0])){
            $errors = [ 'database' => 'This Email Already Exists' ];
            $old = ['email' => get('email')];
            Session::set('errors',$errors);
            Session::set('old',$old);
            return false;
        }
    
        return true;
    }



}