<?php

namespace App\Providers;

use Exception;
use GuzzleHttp\Client;
use App\Session\Session;
use App\Core\MyContainer;
use AliseeksApi\Model\Amount;
use App\Helpers\RefactorBody;
use AliseeksApi\Api\SearchApi;
use AliseeksApi\Configuration;
use AliseeksApi\Api\ProductsApi;
use AliseeksApi\Model\DoubleRange;
use AliseeksApi\Model\SearchRequest;
use AliseeksApi\Model\ProductPriceOption;
use AliseeksApi\Model\ProductSkusRequest;
use AliseeksApi\Model\ProductDetailsRequest;
use Psr\Http\Message\ServerRequestInterface;
use AliseeksApi\Model\ProductShippingRequest;

class ApiServiceProvider
{
    protected $request;
    protected $config;

    public function __construct(ServerRequestInterface $request, Configuration $config){
        $this->request = $request;
        $this->config = $config;
    }

    public function search()
    {

        $apiInstance = new SearchApi(
            new Client(),
            $this->config
        );     

        // Set Values As Required In SearchRequest Constructor And aliseeks-php-sdk documentation
        $refactorBody = new RefactorBody($this->request);
        $body = $refactorBody->refactor();        
               
        $search_request = new SearchRequest($body); // \AliseeksApi\Model\SearchRequest | Search request body
      
        try {
            $result = $apiInstance->search($search_request);
        } catch (Exception $e) {
            echo 'Exception when calling SearchApi->search: ', $e->getMessage(), PHP_EOL;
        }

        return $result;
    }

    public function productDetails()
    {
        $apiInstance = new ProductsApi(
            new Client(),
            $this->config
        );      

        $product_id = get('id'); 
               
        $product_details_request  = new ProductDetailsRequest(['product_id' => $product_id]); // \AliseeksApi\Model\ProductDetailsRequest | ProductDetails request body
      
        try {
            $result = $apiInstance->getProductDetails($product_details_request);
        } catch (Exception $e) {
            echo 'Exception when calling getProductDetails: ', $e->getMessage(), PHP_EOL;
        }

        return $result;
    }

    public function productProperties()
    {
        $apiInstance = new ProductsApi(
            new Client(), 
            $this->config
        );  

        $product_id = get('id');

        $product_skus_request = new ProductSkusRequest(['product_id' => $product_id]);

        try {
            $result = $apiInstance->getProductSkus($product_skus_request);
        } catch (Exception $e) {
            echo 'Exception when calling getProductSkus: ', $e->getMessage(), PHP_EOL;
        }

        return $result;
    }

    public function productShipping()
    {
        $apiInstance = new ProductsApi(
            new Client(), 
            $this->config
        ); 

        $product_id = get('id');
        $country = Session::get('country');
        $currency = Session::get('currency');

        $product_shipping_request = new ProductShippingRequest(
            [
                'product_id' => $product_id,
                'country' => $country,
                'currency' => $currency
            ]
        );

        try {
            $result = $apiInstance->getProductShipping($product_shipping_request);
        } catch (Exception $e) {
            echo 'Exception when calling ProductsApi->getProductShipping: ', $e->getMessage(), PHP_EOL;
        }

        return $result;
        
    }
}