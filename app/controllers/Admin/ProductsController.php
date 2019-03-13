<?php

namespace App\Controllers\Admin;

use App\DAO\ProductDAO;
use App\DAO\CategoryDAO;
use App\Controllers\Controller;
use Psr\Http\Message\ResponseInterface;
use App\Validation\Import\PublishValidation;
use Zend\Diactoros\Response\RedirectResponse;


class ProductsController extends Controller
{

    public function index($request, $response) : ResponseInterface
    {
        $productDAO = new ProductDAO($this->entityManager);
        $products = $productDAO->liveProducts();

        return $this->render($response,'/admin/products/index', ['products' => $products]);
    }

    public function details($request,$response) : ResponseInterface
    {
        $repository = $this->entityManager->getRepository('App\Models\Product');
        $product = $repository->find(get('id'));

        $images = $this->entityManager->getRepository('App\Models\Image')->findByProduct($product);
        $attributes = $this->entityManager->getRepository('App\Models\Attribute')->findByProduct($product);
        $variations = $this->entityManager->getRepository('App\Models\Variation')->findByProduct($product);
        $propertyValues = $this->entityManager->getRepository('App\Models\PropertyValue')->findByProduct($product);
        $shippingServices = $this->entityManager->getRepository('App\Models\ShippingServices')->findByProduct($product);


        return $this->render($response,'/admin/products/details',
            [
                'product' => $product,
                'images' => $images,
                'variations' => $variations,
                'propertyValues' => $propertyValues,
                'shippingServices' => $shippingServices
            ]
        );
    }


    public function store($request,$response) : ResponseInterface
    {

        $validation = new PublishValidation($request, $response);

        // Validate Input Data && If Error occured => Save Errors To Session
        if (!$validation->validate()) {
            // redirect last path with id parameter
            $lastUrl = parse_url($_SERVER['HTTP_REFERER'])['path'];
            return new RedirectResponse($lastUrl.'?id='.$_POST['id']);
        }

        $productDAO = new ProductDAO($this->entityManager);
        $productDAO->publish();

        $products = $productDAO->all();

        return new RedirectResponse('/admin/products');
    
    }

    public function delete($request,$response)
    {
        $id = get('id');
        $productDAO = new ProductDAO($this->entityManager);
        $productDAO->delete($id);

        return new RedirectResponse('/admin/products');
    }

    public function edit($request,$response)
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET') {

                // Flash Validation Feedback if exist
            $validation = new PublishValidation($request, $response);
            $validationFeedback = $validation->flashFeedback();
            
            $repository = $this->entityManager->getRepository('App\Models\Product');
            $product = $repository->findById(get('id'));
            $product = $product[0];

            $categoryDAO = new CategoryDAO($this->entityManager);
            $categories = $categoryDAO->all();

            return $this->render($response,'/admin/products/edit',
                [
                    'product' => $product,
                    'categories' => $categories,
                    'errors' => $validationFeedback['errors'] ?? '',
                    'old' => $validationFeedback['old'] ?? ''
                ]
            );

        } else if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $validation = new PublishValidation($request, $response);

            // Validate Input Data && If Error occured => Save Errors To Session
            if (!$validation->validate()) {
                // redirect last path with id parameter
                $lastUrl = parse_url($_SERVER['HTTP_REFERER'])['path'];
                return new RedirectResponse($lastUrl.'?id='.$_POST['id']);
            }

            $productDAO = new ProductDAO($this->entityManager);
            $productDAO->update();

            $products = $productDAO->liveProducts();

            return $this->render($response,'/admin/products/index',['products' => $products]);
        }
        
    }

}
  
  
  
  
  
  
  
  
  
  
  