<?php

namespace App\Controllers;

use App\DAO\CategoryDAO;
use App\DAO\ProductDAO;
use Psr\Http\Message\ResponseInterface;

class ProductsController extends Controller
{
    public function index($request, $response) : ResponseInterface
    {
        $productDAO = new ProductDAO($this->entityManager);
        $products = $productDAO->liveProducts();

        $categoryDAO = new CategoryDAO($this->entityManager);
        $categories = $categoryDAO->all();


        foreach($categories as $category){
            if (get('filter') == $category->getId()){
                $products = array_filter($products, function($product) {
                    if($product->getCategoryId() == get('filter')) {
                        return true;
                    }
                });

            }
        }

        $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
        $filter = isset($_GET["filter"]) ? get('filter') : 'all';


        return $this->render($response, '/public/products/index',
            [
                'products' => $products,
                'categories' => $categories,
                "page" => $page,
                "filter" => $filter
            ]
        );
    }

    public function details($request,$response) : ResponseInterface
    {
        $product = $this->entityManager->getRepository('App\Models\Product')->find(get('id'));

        $images = $this->entityManager->getRepository('App\Models\Image')->findByProduct($product);
        $attributes = $this->entityManager->getRepository('App\Models\Attribute')->findByProduct($product);
        $variations = $this->entityManager->getRepository('App\Models\Variation')->findByProduct($product);
        $propertyValues = $this->entityManager->getRepository('App\Models\PropertyValue')->findByProduct($product);
        $shippingServices = $this->entityManager->getRepository('App\Models\ShippingServices')->findByProduct($product);

        return $this->render($response,'/public/products/details',
            [
                'product' => $product,
                'images' => $images,
                'variations' => $variations,
                'propertyValues' => $propertyValues,
                'shippingServices' => $shippingServices
            ]
        );

    }

}

