<?php

namespace App\DAO;

use Doctrine\ORM\EntityManager;

class DAO
{
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
}