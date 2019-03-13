<?php

namespace App\Controllers\Admin;

use App\DAO\ProductDAO;
use App\DAO\CategoryDAO;
use App\Controllers\Controller;
use App\Providers\ApiServiceProvider;
use Psr\Http\Message\ResponseInterface;
use App\Validation\Import\PublishValidation;
use Zend\Diactoros\Response\RedirectResponse;


class ImportProductsController extends Controller
{

    public function index($request,$response)
    {
        $productDAO = new ProductDAO($this->entityManager);
        $products = $productDAO->importList();

        return $this->render($response,'/admin/importList/index', ['products' => $products]);
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


        return $this->render($response,'/admin/importList/details',
            [
                'product' => $product,
                'images' => $images,
                'variations' => $variations,
                'propertyValues' => $propertyValues,
                'shippingServices' => $shippingServices
            ]
        );
    }   

    public function store($request,$response)
    {
       
        // Get product details
        $apiServiceProvider = new ApiServiceProvider($request, $this->aliConfig);
        $details = $apiServiceProvider->productDetails();
        // Store Product Draft
        $productDAO = new ProductDAO($this->entityManager);
        $productDAO->store($details);

        // Store Product Related data

        // Variations
        $properties = $apiServiceProvider->productProperties();
        $variationDAO = new VariationDAO($this->entityManager);
        $variationDAO->store($properties);

        // Attributes
        $attributeDAO = new AttributeDAO($this->entityManager);
        $attributeDAO->store($details);

        // property values
        $propertyValueDAO = new PropertyValueDAO($this->entityManager);
        $propertyValueDAO->store($details);

        // Images
        $imageDAO = new ImageDAO($this->entityManager);
        $imageDAO->store($details);

        // Shipping data
        $shipping = $apiServiceProvider->productShipping();
        $shippingServicesDAO = new ShippingServicesDAO($this->entityManager);
        $shippingServicesDAO->store($shipping);
        
        return new RedirectResponse('/admin/importList');

    }

    public function publish($request,$response)
    { 

        // Flash Validation Feedback if exist
        $validation = new PublishValidation($request, $response);
        $validationFeedback = $validation->flashFeedback();
        
        $repository = $this->entityManager->getRepository('App\Models\Product');
        $product = $repository->findById(get('id'));
        $product = $product[0];

        $categoryDAO = new CategoryDAO($this->entityManager);
        $categories = $categoryDAO->all();

        return $this->render($response,'/admin/importList/publish',
            [
                'product' => $product,
                'categories' => $categories,
                'errors' => $validationFeedback['errors'] ?? '',
                'old' => $validationFeedback['old'] ?? ''
            ]
        );
    }

    public function delete($request,$response)
    {
        $id = get('id');
        $productDAO = new ProductDAO($this->entityManager);
        $productDAO->delete($id);

        return new RedirectResponse('/admin/importList');
    }

      

}