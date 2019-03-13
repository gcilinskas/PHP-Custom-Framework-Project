<?php

namespace App\DAO;

use App\Models\Property;
use App\Models\PropertyValue;
use App\Models\Product;
use App\Models\Image;
use Doctrine\ORM\ORMException;

class PropertyValueDAO extends DAO
{

    public function store($result)
    {   

        // Get Added Product
        $repository = $this->entityManager->getRepository('App\Models\Product');
        $product = $repository->findByRetailerProductId(get('id'));
        $product = $product[0];

        foreach($result['sku_properties'] as $sku_property){
            foreach($sku_property['values'] as $value){
                
                $propertyValue = new PropertyValue();
                $propertyValue->setPropertyName($sku_property['property_name']);
                $propertyValue->setPropertyValue($value['property_value_display_name']);
                $propertyValue->setProduct($product);

                if($propertyValue->getPropertyName() == null) {
                    return;
                }
                  
                try {
                    $this->entityManager->persist($propertyValue);
                    $this->entityManager->flush();
                } catch (ORMException $e) {
                    dump($e);
                }
            }
            
           

         

            
        }

        
    }

    public function update()
    {

    }

    public function delete()
    {

    }

    public function all()
    {
        return $this->entityManager->getRepository("App\Models\PropertyValue")->findAll();
    }

    public function get()
    {
        
    }
}