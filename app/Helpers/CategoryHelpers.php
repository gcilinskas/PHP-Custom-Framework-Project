<?php

namespace App\Helpers;

use App\DAO\CategoryDAO;
use Doctrine\ORM\EntityManager;

class CategoryHelpers
{
    public function setEditFields(EntityManager $entityManager)
    {
        // Get Saved Fields
        $categoryDAO = new CategoryDAO($entityManager);
        $category =  $categoryDAO->get();

        $data = [
            'old' => [
                'id' => $category->getId(),
                'title' => $category->getTitle(),
                'description' => $category->getDescription()
            ]
        ];
        return $data;
    }
}