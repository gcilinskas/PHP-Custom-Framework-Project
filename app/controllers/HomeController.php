<?php

namespace App\Controllers;

use App\DAO\ProductDAO;
use Psr\Http\Message\ResponseInterface;

class HomeController extends Controller
{
    public function index($request, $response) : ResponseInterface
    {
        $productDAO = new ProductDAO($this->entityManager);
        $products = $productDAO->liveProducts();
        return $this->render($response, '/public/index',['products' => $products]);
    }
}

