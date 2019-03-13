<?php

namespace App\DAO;

use App\Models\Attribute;
use Doctrine\ORM\ORMException;

class AttributeDAO extends DAO
{
    public function store($result)
    {

       // Get Added Product
       $repository = $this->entityManager->getRepository('App\Models\Product');
       $product = $repository->findByRetailerProductId(get('id'));
       $product = $product[0];
            
       foreach($result['attributes'] as $attributeItem){
            $attribute = new Attribute();        
            $attribute->setName($attributeItem['name']);
            $attribute->setValue($attributeItem['value']);
            $attribute->setProduct($product);

            if($attribute->getName() == null) {
                return;
            }

            try {
                $this->entityManager->persist($attribute);
                $this->entityManager->flush();
            } catch (ORMException $e) {
                dump($e);
            }

       }

        
    }
}