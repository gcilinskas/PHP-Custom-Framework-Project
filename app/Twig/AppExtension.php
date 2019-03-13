<?php

namespace App\Twig;

use Twig\TwigFunction;
use App\Session\Session;
use Doctrine\ORM\EntityManager;
use Twig\Extension\AbstractExtension;

class AppExtension extends AbstractExtension
{
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('isImported', [$this, 'isImported']),
            new TwigFunction('getSessionObject',[$this,'getSessionObject'])
        ];
    }

    public function getSessionObject($objName){
        if(Session::exists('user')){
            $object = unserialize($_SESSION[$objName]);
            return $object;
        }
        return null;
    }

    public function isImported($product_id)
    {

        $repository = $this->em->getRepository('App\Models\Product');
        $product = $repository->findOneByRetailerProductId($product_id);

        if($product) {
            return true;
        } else {
            return false;
        }

    }

    public function getName()
    {
        return 'isImported';
    }
}