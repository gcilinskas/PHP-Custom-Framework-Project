<?php

namespace App\DAO;

use App\Models\ShippingServices;
use Doctrine\ORM\ORMException;

class ShippingServicesDAO extends DAO
{
    public function store($result)
    {   

       ;

        // Get Added Product
        $repository = $this->entityManager->getRepository('App\Models\Product');
        $product = $repository->findByRetailerProductId(get('id'));
        $product = $product[0];

        foreach($result['options'] as $shipping){
            $shippingServices = new ShippingServices();
            $shippingServices->setCompany($shipping['company']);
            $shippingServices->setServiceName($shipping['service_name']);
            $shippingServices->setTracking($shipping['tracking']);
            $shippingServices->setPrice($shipping['amount']['value']);
            $shippingServices->setCurrency($shipping['amount']['currency']);
            $shippingServices->setCommitDays($shipping['commit_days']);
            $shippingServices->setShipsFrom($shipping['ship_from']);
            $shippingServices->setDeliveryTimeFrom($shipping['delivery_time']['from']);
            $shippingServices->setDeliveryTimeTo($shipping['delivery_time']['to']);
            $shippingServices->setProduct($product);

            if($shippingServices->getCompany() == null) {
                return;
            }

            try {
                $this->entityManager->persist($shippingServices);
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