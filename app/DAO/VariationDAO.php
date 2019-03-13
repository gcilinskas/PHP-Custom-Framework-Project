<?php

namespace App\DAO;

use App\Models\Variation;
use Doctrine\ORM\ORMException;

class VariationDAO extends DAO
{
    public function store($result)
    {
       // Get Added Product
       $repository = $this->entityManager->getRepository('App\Models\Product');
       $product = $repository->findByRetailerProductId(get('id'));
       $product = $product[0];

       foreach($result['variations'] as $sku_property){
            
            $variation = new Variation();

            // prevent null from given api data
            foreach($sku_property['property_identifiers'] as $sku) {
                if($sku['property_value_name'] != null) {
                    $variation->setName($sku['property_value_name']);
                };
            }


            $variation->setRetailerPrice($sku_property['discounted_price']['value']);
            $variation->setCurrency($sku_property['discounted_price']['currency']);
            $variation->setStock($sku_property['stock']);
            $variation->setImageUrl($sku_property['image_url']);
            $variation->setProduct($product);

            if($variation->getName() == null){
                return;
            }


            try {
                $this->entityManager->persist($variation);
                $this->entityManager->flush();
            } catch (ORMException $e) {
                dump($e);
            }
        
        }
    }

    public function all()
    {
        return $this->entityManager->getRepository("App\Models\Variation")->findAll();
    }
}