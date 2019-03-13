# AliseeksApi\SearchApi

All URIs are relative to *https://api.aliseeks.com/v1*

Method | HTTP request | Description
------------- | ------------- | -------------
[**realtimeSearch**](SearchApi.md#realtimeSearch) | **POST** /search/realtime | Searches AliExpress in realtime
[**search**](SearchApi.md#search) | **POST** /search | Searches AliExpress in non-realtime. Uses the Aliseeks.com datasource which is continually updated from AliExpress.
[**searchBestSelling**](SearchApi.md#searchBestSelling) | **POST** /search/bestSelling | Retrieves best selling products from AliExpress in realtime.
[**searchByImage**](SearchApi.md#searchByImage) | **POST** /search/image | Searches AliExpress by image in realtime.
[**uploadImageByUrl**](SearchApi.md#uploadImageByUrl) | **POST** /search/image/upload | Uploads an image to AliExpress to allow it to be used in the image search endpoint


# **realtimeSearch**
> \AliseeksApi\Model\RealtimeSearchResponse realtimeSearch($realtime_search_request)

Searches AliExpress in realtime

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: ApiKeyAuth
$config = AliseeksApi\Configuration::getDefaultConfiguration()->setApiKey('X-API-CLIENT-ID', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AliseeksApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-CLIENT-ID', 'Bearer');

$apiInstance = new AliseeksApi\Api\SearchApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$realtime_search_request = new \AliseeksApi\Model\RealtimeSearchRequest(); // \AliseeksApi\Model\RealtimeSearchRequest | Realtime search request body

try {
    $result = $apiInstance->realtimeSearch($realtime_search_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SearchApi->realtimeSearch: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **realtime_search_request** | [**\AliseeksApi\Model\RealtimeSearchRequest**](../Model/RealtimeSearchRequest.md)| Realtime search request body |

### Return type

[**\AliseeksApi\Model\RealtimeSearchResponse**](../Model/RealtimeSearchResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **search**
> \AliseeksApi\Model\SearchResponse search($search_request)

Searches AliExpress in non-realtime. Uses the Aliseeks.com datasource which is continually updated from AliExpress.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: ApiKeyAuth
$config = AliseeksApi\Configuration::getDefaultConfiguration()->setApiKey('X-API-CLIENT-ID', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AliseeksApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-CLIENT-ID', 'Bearer');

$apiInstance = new AliseeksApi\Api\SearchApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$search_request = new \AliseeksApi\Model\SearchRequest(); // \AliseeksApi\Model\SearchRequest | Search request body

try {
    $result = $apiInstance->search($search_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SearchApi->search: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **search_request** | [**\AliseeksApi\Model\SearchRequest**](../Model/SearchRequest.md)| Search request body |

### Return type

[**\AliseeksApi\Model\SearchResponse**](../Model/SearchResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **searchBestSelling**
> \AliseeksApi\Model\BestSellingSearchResponse searchBestSelling($best_selling_search_request)

Retrieves best selling products from AliExpress in realtime.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: ApiKeyAuth
$config = AliseeksApi\Configuration::getDefaultConfiguration()->setApiKey('X-API-CLIENT-ID', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AliseeksApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-CLIENT-ID', 'Bearer');

$apiInstance = new AliseeksApi\Api\SearchApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$best_selling_search_request = new \AliseeksApi\Model\BestSellingSearchRequest(); // \AliseeksApi\Model\BestSellingSearchRequest | Search best selling request body

try {
    $result = $apiInstance->searchBestSelling($best_selling_search_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SearchApi->searchBestSelling: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **best_selling_search_request** | [**\AliseeksApi\Model\BestSellingSearchRequest**](../Model/BestSellingSearchRequest.md)| Search best selling request body |

### Return type

[**\AliseeksApi\Model\BestSellingSearchResponse**](../Model/BestSellingSearchResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **searchByImage**
> \AliseeksApi\Model\ImageSearchResponse searchByImage($image_search_request)

Searches AliExpress by image in realtime.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: ApiKeyAuth
$config = AliseeksApi\Configuration::getDefaultConfiguration()->setApiKey('X-API-CLIENT-ID', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AliseeksApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-CLIENT-ID', 'Bearer');

$apiInstance = new AliseeksApi\Api\SearchApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$image_search_request = new \AliseeksApi\Model\ImageSearchRequest(); // \AliseeksApi\Model\ImageSearchRequest | The image search request body

try {
    $result = $apiInstance->searchByImage($image_search_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SearchApi->searchByImage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **image_search_request** | [**\AliseeksApi\Model\ImageSearchRequest**](../Model/ImageSearchRequest.md)| The image search request body |

### Return type

[**\AliseeksApi\Model\ImageSearchResponse**](../Model/ImageSearchResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **uploadImageByUrl**
> \AliseeksApi\Model\UploadImageResponse uploadImageByUrl($upload_image_by_url_request)

Uploads an image to AliExpress to allow it to be used in the image search endpoint

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: ApiKeyAuth
$config = AliseeksApi\Configuration::getDefaultConfiguration()->setApiKey('X-API-CLIENT-ID', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = AliseeksApi\Configuration::getDefaultConfiguration()->setApiKeyPrefix('X-API-CLIENT-ID', 'Bearer');

$apiInstance = new AliseeksApi\Api\SearchApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$upload_image_by_url_request = new \AliseeksApi\Model\UploadImageByUrlRequest(); // \AliseeksApi\Model\UploadImageByUrlRequest | The upload image by url request body

try {
    $result = $apiInstance->uploadImageByUrl($upload_image_by_url_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SearchApi->uploadImageByUrl: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **upload_image_by_url_request** | [**\AliseeksApi\Model\UploadImageByUrlRequest**](../Model/UploadImageByUrlRequest.md)| The upload image by url request body |

### Return type

[**\AliseeksApi\Model\UploadImageResponse**](../Model/UploadImageResponse.md)

### Authorization

[ApiKeyAuth](../../README.md#ApiKeyAuth)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

