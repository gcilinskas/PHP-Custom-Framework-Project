# SearchItem

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | AliExpress Product ID | [optional] 
**title** | **string** | The subject / title of the product | [optional] 
**category_id** | **int** | The category of the item | [optional] 
**image_url** | **string** | Image URL for the item | [optional] 
**detail_url** | **string** | The detail URL of the item | [optional] 
**lot_size** | **int** | The lot size that the item is sold in | [optional] 
**lot_unit** | **string** | The unit when describing a lot for this item | [optional] 
**price** | [**\AliseeksApi\Model\Amount**](Amount.md) |  | [optional] 
**ratings** | **double** | The ratings of this item | [optional] 
**orders** | **double** | The number of orders of this item | [optional] 
**freight** | [**\AliseeksApi\Model\SearchItemFreight**](SearchItemFreight.md) |  | [optional] 
**seller** | [**\AliseeksApi\Model\SearchItemSeller**](SearchItemSeller.md) |  | [optional] 
**freight_types** | [**\AliseeksApi\Model\SearchItemFreightType[]**](SearchItemFreightType.md) | List of freight types available for this item | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


