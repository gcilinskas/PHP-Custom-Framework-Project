# AliseeksApi\ProductsApi

All URIs are relative to *https://api.aliseeks.com/v1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getProduct**](ProductsApi.md#getProduct) | **POST** /products | Get products details as an aggregated request from AliExpress in realtime.
[**getProductDetails**](ProductsApi.md#getProductDetails) | **POST** /products/details | Gets product details from AliExpress in realtime.
[**getProductHtmlDescription**](ProductsApi.md#getProductHtmlDescription) | **POST** /products/description/html | Get product HTML description from AliExpress in realtime.
[**getProductShipping**](ProductsApi.md#getProductShipping) | **POST** /products/shipping | Gets product shipping information AliExpress in realtime.
[**getProductSkus**](ProductsApi.md#getProductSkus) | **POST** /products/variations | Gets product skus / variation information from AliExpress in realtime.


# **getProduct**
> \AliseeksApi\Model\Product getProduct($product_request)

Get products details as an aggregated request from AliExpress in realtime.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: ApiKeyAuth
$config = AliseeksApi\Configuration::getDefaultConfiguration()->setApiKey('X-API-CLIENT-ID', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AliseeksApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-CLIENT-ID', 'Bearer');

$apiInstance = new AliseeksApi\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$product_request = new \AliseeksApi\Model\ProductRequest(); // \AliseeksApi\Model\ProductRequest | The request body of get product

try {
    $result = $apiInstance->getProduct($product_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->getProduct: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **product_request** | [**\AliseeksApi\Model\ProductRequest**](../Model/ProductRequest.md)| The request body of get product | [optional]

### Return type

[**\AliseeksApi\Model\Product**](../Model/Product.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getProductDetails**
> \AliseeksApi\Model\ProductDetail getProductDetails($product_details_request)

Gets product details from AliExpress in realtime.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: ApiKeyAuth
$config = AliseeksApi\Configuration::getDefaultConfiguration()->setApiKey('X-API-CLIENT-ID', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AliseeksApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-CLIENT-ID', 'Bearer');

$apiInstance = new AliseeksApi\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$product_details_request = new \AliseeksApi\Model\ProductDetailsRequest(); // \AliseeksApi\Model\ProductDetailsRequest | The request body to get product details

try {
    $result = $apiInstance->getProductDetails($product_details_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->getProductDetails: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **product_details_request** | [**\AliseeksApi\Model\ProductDetailsRequest**](../Model/ProductDetailsRequest.md)| The request body to get product details |

### Return type

[**\AliseeksApi\Model\ProductDetail**](../Model/ProductDetail.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getProductHtmlDescription**
> \AliseeksApi\Model\ProductHtmlDescription getProductHtmlDescription($product_html_description_request)

Get product HTML description from AliExpress in realtime.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: ApiKeyAuth
$config = AliseeksApi\Configuration::getDefaultConfiguration()->setApiKey('X-API-CLIENT-ID', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AliseeksApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-CLIENT-ID', 'Bearer');

$apiInstance = new AliseeksApi\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$product_html_description_request = new \AliseeksApi\Model\ProductHtmlDescriptionRequest(); // \AliseeksApi\Model\ProductHtmlDescriptionRequest | The request body to get product html description

try {
    $result = $apiInstance->getProductHtmlDescription($product_html_description_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->getProductHtmlDescription: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **product_html_description_request** | [**\AliseeksApi\Model\ProductHtmlDescriptionRequest**](../Model/ProductHtmlDescriptionRequest.md)| The request body to get product html description |

### Return type

[**\AliseeksApi\Model\ProductHtmlDescription**](../Model/ProductHtmlDescription.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getProductShipping**
> \AliseeksApi\Model\ProductShipping getProductShipping($product_shipping_request)

Gets product shipping information AliExpress in realtime.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: ApiKeyAuth
$config = AliseeksApi\Configuration::getDefaultConfiguration()->setApiKey('X-API-CLIENT-ID', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AliseeksApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-CLIENT-ID', 'Bearer');

$apiInstance = new AliseeksApi\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$product_shipping_request = new \AliseeksApi\Model\ProductShippingRequest(); // \AliseeksApi\Model\ProductShippingRequest | The request body to get product shipping

try {
    $result = $apiInstance->getProductShipping($product_shipping_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->getProductShipping: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **product_shipping_request** | [**\AliseeksApi\Model\ProductShippingRequest**](../Model/ProductShippingRequest.md)| The request body to get product shipping |

### Return type

[**\AliseeksApi\Model\ProductShipping**](../Model/ProductShipping.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getProductSkus**
> \AliseeksApi\Model\ProductSkus getProductSkus($product_skus_request)

Gets product skus / variation information from AliExpress in realtime.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: ApiKeyAuth
$config = AliseeksApi\Configuration::getDefaultConfiguration()->setApiKey('X-API-CLIENT-ID', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AliseeksApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-CLIENT-ID', 'Bearer');

$apiInstance = new AliseeksApi\Api\ProductsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$product_skus_request = new \AliseeksApi\Model\ProductSkusRequest(); // \AliseeksApi\Model\ProductSkusRequest | The request body to get product skus / variations

try {
    $result = $apiInstance->getProductSkus($product_skus_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProductsApi->getProductSkus: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **product_skus_request** | [**\AliseeksApi\Model\ProductSkusRequest**](../Model/ProductSkusRequest.md)| The request body to get product skus / variations |

### Return type

[**\AliseeksApi\Model\ProductSkus**](../Model/ProductSkus.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

