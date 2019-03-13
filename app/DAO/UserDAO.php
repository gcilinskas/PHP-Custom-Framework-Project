<?php

namespace App\DAO;

use App\Models\User;
use Doctrine\ORM\ORMException;


class UserDAO extends DAO
{


    public function store()
    {   
        $hashedPassword = password_hash(get('password'), PASSWORD_DEFAULT);

        $user = new User();
        $user->setEmail(get('email'));
        $user->setPassword($hashedPassword);

        try {
            $this->entityManager->persist($user);
            $this->entityManager->flush();
        } catch (ORMException $e) {
            dump($e);
        }
        
    }

    public function update()
    {
       
    }

    public function get($id)
    {
        $user =  $this->entityManager->getRepository('App\Models\User')->findById($id);
        if(array_key_exists(0,$user)){
            $user = $user[0];
            return $user;
        } else {
            return null;
        }

    }

}