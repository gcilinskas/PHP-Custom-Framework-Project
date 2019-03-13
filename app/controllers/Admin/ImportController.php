<?php

namespace App\Controllers\Admin;

use App\DAO\ImageDAO;
use App\DAO\ProductDAO;
use App\Session\Session;
use App\DAO\AttributeDAO;
use App\DAO\VariationDAO;
use App\DAO\ApiCategoryDAO;
use App\DAO\PropertyValueDAO;
use App\Controllers\Controller;
use App\DAO\ShippingServicesDAO;
use App\Providers\ApiServiceProvider;
use Psr\Http\Message\ResponseInterface;
use App\Validation\Import\SearchValidation;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\RedirectResponse;

class ImportController extends Controller
{
    
    public function index(ServerRequestInterface $request, ResponseInterface $response) : ResponseInterface
    {

        // get apiCategories to give search parameters
        $apiCategoriesDAO = new ApiCategoryDAO($this->entityManager);
        $apiCategories = $apiCategoriesDAO->all();

         // Flash Validation Feedback if exist
         $validation = new SearchValidation($request, $response);
         $validationFeedback = $validation->flashFeedback();

         // delete old saved sessions
         Session::clear('country','currency');

        return $this->render($response,'/admin/import/index',
        [
            'apiCategories' => $apiCategories,
            'errors' => $validationFeedback['errors'] ?? '',
            'old' => $validationFeedback['old'] ?? ''
            ]
        );
    }

    public function search($request,$response) : ResponseInterface
    {

        $validation = new SearchValidation($request, $response);

        // Validate Input Data && If Error occured => Save Errors To Session
        if (!$validation->validate()) {
            $lastUrl = parse_url($_SERVER['HTTP_REFERER'])['path'];
            return new RedirectResponse($lastUrl);
        }

        $apiServiceProvider = new ApiServiceProvider($request, $this->aliConfig);
        $results = $apiServiceProvider->search();
        $resultsArray = $results['items'];

        // save fields in order to get specific shipping data
        $country = get('country');
        $currency = get('currency');
        Session::set('country',$country);
        Session::set('currency',$currency);

        return $this->render($response,'/admin/import/results',['results' => $resultsArray]);
    
    }

    public function details($request,$response) : ResponseInterface
    {
        $apiServiceProvider = new ApiServiceProvider($request, $this->aliConfig);
        $result = $apiServiceProvider->productDetails();


        return $this->render($response,'/admin/import/details',['result' => $result]);
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

}