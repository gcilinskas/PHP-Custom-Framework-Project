<?php

namespace App\DAO;

use App\Models\CartLine;
use Doctrine\ORM\ORMException;


class CartLineDAO extends DAO
{


    public function store($cart)
    {   

        $productId = get('id');
        $product =  $this->entityManager->getRepository("App\Models\Product")->findById($productId);
        $product = $product[0];
        $cartLine = new CartLine();
        $cartLine->setCart($cart);
        $cartLine->setProduct($product);
        $cartLine->setQuantity(1);
        $cartLine->setPriceTotal($product->getPrice());

        try {
            $this->entityManager->persist($cartLine);
            $this->entityManager->flush();
        } catch (ORMException $e) {
            dump($e);
        }
        
    }


    public function currentCart()
    {
        return $this->entityManager->getRepository("App\Models\Cart")->findByIsLive(true);
    }
    public function purchasedCarts()
    {
        return $this->entityManager->getRepository("App\Models\Product")->findByIsLive(false);
    }

    public function deleteByProductId($productId)
    {
        $cartLine = $this->entityManager->getRepository("App\Models\CartLine")->findOneBy(['productId' => $productId]);
        if($cartLine){
            try {
                $this->entityManager->remove($cartLine);
                $this->entityManager->flush();
            } catch (ORMException $e) {
                dump($e);
            }
        }


    }
}