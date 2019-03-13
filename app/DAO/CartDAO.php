<?php

namespace App\DAO;

use App\Models\Cart;
use App\Session\Session;
use Doctrine\ORM\ORMException;


class CartDAO extends DAO
{


    public function store()
    {   
        $user = Session::unserialize('user');
        $user = $this->entityManager->getRepository("App\Models\User")->findById($user->getId());
        $user = $user[0];
        
        $cart = new Cart();
        $cart->setUser($user);
        $cart->setIsPurchased(false);

        try {
            $this->entityManager->persist($cart);
            $this->entityManager->flush();
        } catch (ORMException $e) {
            dump($e);
        }
        
    }

    public function update()
    {
        // try {
        //     $queryBuilder = $this->entityManager->createQueryBuilder();
        //     $query = $queryBuilder->update('App\Models\Product', 'p')
        //         ->set('p.title', '?1')
        //         ->set('p.isLive', '?2')
        //         ->set('p.category', '?3')
        //         ->set('p.price', '?4')
        //         ->where('p.id = ?5')
        //         ->setParameter(1, get('title'))
        //         ->setParameter(2, 1)
        //         ->setParameter(3, get('category'))
        //         ->setParameter(4, get('price'))
        //         ->setParameter(5, get('id'))
        //         ->getQuery();
        //     $query->execute();
        // } catch(ORMException $e) {
        //     dump($e);
        // }
    }


    // public function currentCart()
    // {
    //     return $this->entityManager->getRepository("App\Models\Cart")->findByIsLive(true);
    // }
    // public function purchasedCarts()
    // {
    //     return $this->entityManager->getRepository("App\Models\Product")->findByIsLive(false);
    // }
}