<?php

namespace App\DAO;

use App\Models\Property;
use App\Models\PropertyValue;
use App\Models\Product;
use App\Models\Image;
use Doctrine\ORM\ORMException;

class ProductDAO extends DAO
{


    public function store($result)
    {   
        
         $product = new Product();
         $product->setRetailerProductId($result['id']);
         $product->setDetailUrl($result['detailUrl']);
         $product->setSellerId($result['seller_id']);
         $product->setCompanyId($result['company_id']);
         $product->setTitle($result['title']);
         $product->setRetailerPrice($result['prices'][0]['max_amount_per_piece']['value']);
         $product->setStock($result['trade']['stock']);
         $product->setIsLive(0); // false
         $product->setCurrency($result['prices'][0]['max_amount_per_piece']['currency']);
         $product->setImageUrl($result['product_images'][0]);
         
        try {
            $this->entityManager->persist($product);
            $this->entityManager->flush();
        } catch (ORMException $e) {
            dump($e);
        }
    }

    public function publish()
    {
        try {
            $queryBuilder = $this->entityManager->createQueryBuilder();
            $query = $queryBuilder->update('App\Models\Product', 'p')
                ->set('p.title', '?1')
                ->set('p.isLive', '?2')
                ->set('p.category', '?3')
                ->set('p.price', '?4')
                ->where('p.id = ?5')
                ->setParameter(1, get('title'))
                ->setParameter(2, 1)
                ->setParameter(3, get('category'))
                ->setParameter(4, get('price'))
                ->setParameter(5, get('id'))
                ->getQuery();
            $query->execute();
        } catch(ORMException $e) {
            dump($e);
        }
    }

    public function update()
    {
        try {
            $queryBuilder = $this->entityManager->createQueryBuilder();
            $query = $queryBuilder->update('App\Models\Product', 'p')
                ->set('p.title', '?1')
                ->set('p.isLive', '?2')
                ->set('p.category', '?3')
                ->set('p.price', '?4')
                ->where('p.id = ?5')
                ->setParameter(1, get('title'))
                ->setParameter(2, 1)
                ->setParameter(3, get('category'))
                ->setParameter(4, get('price'))
                ->setParameter(5, get('id'))
                ->getQuery();
            $query->execute();
        } catch(ORMException $e) {
            dump($e);
        }
    }


    public function delete($id)
    {
        $product = $this->entityManager->getReference("App\Models\Product",$id);
        $this->entityManager->remove($product);
        $this->entityManager->flush();
    }

    public function all()
    {
        return $this->entityManager->getRepository("App\Models\Product")->findAll();
    }

    public function get()
    {
        
    }

    public function liveProducts()
    {
        return $this->entityManager->getRepository("App\Models\Product")->findByIsLive(true);
    }
    public function importList()
    {
        return $this->entityManager->getRepository("App\Models\Product")->findByIsLive(false);
    }
}