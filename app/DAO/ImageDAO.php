<?php

namespace App\DAO;

use App\Models\Image;
use Doctrine\ORM\ORMException;

class ImageDAO extends DAO
{
    public function store($details)
    {   

        // Get Added Product
        $repository = $this->entityManager->getRepository('App\Models\Product');
        $product = $repository->findByRetailerProductId(get('id'));
        $product = $product[0];

        foreach($details['product_images'] as $imageUrl){
            $image = new Image();
            $image->setUrl($imageUrl);
            $image->setProduct($product);
            try {
                $this->entityManager->persist($image);
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