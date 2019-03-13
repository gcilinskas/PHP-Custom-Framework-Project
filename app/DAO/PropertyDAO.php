<?php

namespace App\DAO;

use App\Models\Property;
use App\Models\PropertyValue;
use App\Models\Product;
use App\Models\Image;
use Doctrine\ORM\ORMException;

class PropertyDAO extends DAO
{

    public function store($details)
    {   

        // Get Added Product
        $repository = $this->entityManager->getRepository('App\Models\Product');
        $product = $repository->findByRetailerProductId(get('id'));
        $product = $product[0];

        foreach($details['sku_properties'] as $sku_property){
            $property = new Property();
            $property->setName($sku_property['property_name']);
            $property->setProduct($product);
            try {
                $this->entityManager->persist($property);
                $this->entityManager->flush();
            } catch (ORMException $e) {
                dump($e);
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

    }

    public function get()
    {
        
    }
}