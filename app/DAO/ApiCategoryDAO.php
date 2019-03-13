<?php

namespace App\DAO;

use App\Core\EMF;
use App\Models\ApiCategory;
use Doctrine\ORM\EntityManager;

class ApiCategoryDAO
{

    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function all()
    {
        return $this->entityManager->getRepository("App\Models\ApiCategory")->findAll();
    }

}