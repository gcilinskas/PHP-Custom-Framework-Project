<?php

namespace App\Controllers;

use App\DAO\CartDAO;
use App\DAO\CartLineDAO;
use App\Session\Session;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\RedirectResponse;

class CartController extends Controller
{
    public function index($request, $response) : ResponseInterface
    {
        $user = Session::unserialize('user');
        $cart = $this->entityManager->getRepository("App\Models\Cart")
        ->findOneBy(array('userId' => $user->getId(), 'isPurchased' => false));

        $cartLines = $this->entityManager->getRepository('App\Models\CartLine')->findByCart($cart);

        return $this->render($response, '/public/cart/index',['cartLines' => $cartLines]);
    }

    public function addToCart($request,$response)
    {
        $user = Session::unserialize('user');
        $cart = $this->entityManager->getRepository("App\Models\Cart")
                ->findOneBy(array('userId' => $user->getId(), 'isPurchased' => false));
       
        if(!$cart){
            $cart = $this->addCart();
        }

        $cartLineDAO = new CartLineDAO($this->entityManager);
        $cartLineDAO->store($cart);

        // $cartLineDAO->getCurrent();
        
        return new RedirectResponse('/');

    }

    public function addCart()
    {
        $cartDAO = new CartDAO($this->entityManager);
        $cartDAO->store();
        
        $user = Session::unserialize('user');
        $cart = $this->entityManager->getRepository("App\Models\Cart")
                ->findOneBy(array('userId' => $user->getId(), 'isPurchased' => false));

        return $cart;
    }




}