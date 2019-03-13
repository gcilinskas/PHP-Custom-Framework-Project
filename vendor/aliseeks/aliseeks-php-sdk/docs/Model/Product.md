# Product

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | The AliExpress item ID | [optional] 
**category_id** | **string** | The item category | [optional] 
**company_id** | **string** | The company ID | [optional] 
**seller_id** | **string** | The seller ID | [optional] 
**title** | **string** | The subject / title of the item | [optional] 
**status_id** | **int** | The AliExpress status ID | [optional] 
**status** | **string** | The AliExpress status | [optional] 
**count_per_lot** | **int** | The number of items per lot | [optional] 
**wish_list_count** | **int** | Number of times the item has been added to a wishlist | [optional] 
**unit** | **string** | The unit of the item | [optional] 
**multi_unit** | **string** | The unit for multiple items | [optional] 
**seller** | [**\AliseeksApi\Model\ProductSeller**](ProductSeller.md) |  | [optional] 
**reviews** | [**\AliseeksApi\Model\ProductReviews**](ProductReviews.md) |  | [optional] 
**trade** | [**\AliseeksApi\Model\TradeInformation**](TradeInformation.md) |  | [optional] 
**promotion** | [**\AliseeksApi\Model\ProductPromotion**](ProductPromotion.md) |  | [optional] 
**product_images** | **string[]** | The item images | [optional] 
**attributes** | [**\AliseeksApi\Model\ProductAttribute[]**](ProductAttribute.md) | Attributes associated with the AliExpress product | [optional] 
**html_description** | **string** | The product HTML description | [optional] 
**price_summary** | [**\AliseeksApi\Model\PriceSummary**](PriceSummary.md) |  | [optional] 
**prices** | [**\AliseeksApi\Model\SkuPriceOption[]**](SkuPriceOption.md) | All the variations of an AliExpress item and prices associated with each variation | [optional] 
**shipping** | [**\AliseeksApi\Model\ProductShippingOptions[]**](ProductShippingOptions.md) | The shipping options of an AliExpress item | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


