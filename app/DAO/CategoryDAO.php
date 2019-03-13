<?php

namespace App\DAO;

use App\Models\Category;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;

class CategoryDAO extends DAO
{

    public function store()
    {   
         $category = new Category();
         $category->setTitle(get('title'));
         $category->setDescription(get('description'));

        try {
            $this->entityManager->persist($category);
            $this->entityManager->flush();
        } catch (ORMException $e) {
            dump($e);
        }

    }

    public function all()
    {
        return $this->entityManager->getRepository("App\Models\Category")->findAll();
    }

    public function delete()
    {
        $id = get('id');
        try {
            $category = $this->entityManager->getReference('App\Models\Category', $id);
            $this->entityManager->remove($category);
            $this->entityManager->flush();
        } catch (ORMException $e) {
            dump($e);
        }
    }

    public function get()
    {
        $id = get('id');
        try {
            $category = $this->entityManager->find('App\Models\Category', $id);
            return $category;
        } catch(ORMException $e) {
            dump($e);
        }
    }

    public function update()
    {
        try {
            $queryBuilder = $this->entityManager->createQueryBuilder();
            $query = $queryBuilder->update('App\Models\Category', 'c')
                ->set('c.title', '?1')
                ->set('c.description', '?2')
                ->where('c.id = ?3')
                ->setParameter(1, get('title'))
                ->setParameter(2, get('description'))
                ->setParameter(3, get('id'))
                ->getQuery();
            $query->execute();
        } catch(ORMException $e) {
            dump($e);
        }
    }


}