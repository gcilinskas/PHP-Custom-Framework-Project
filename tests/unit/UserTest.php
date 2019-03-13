<?php

namespace App\Tests\Unit;

use App\Core\MyContainer;
use App\DAO\CartDAO;
use App\DAO\CartLineDAO;
use App\DAO\UserDAO;
use App\Models\Cart;
use App\Models\CartLine;
use App\Models\Product;
use App\Models\User;
use Doctrine\ORM\EntityManager;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{


    public function testThatWeCanGetTheEmail()
    {
        $user = new User();
        $user->setEmail('email@email.com');

        $this->assertEquals($user->getEmail(),'email@email.com');
    }

    public function test_that_user_can_delete_item_from_cart()
    {
        $container = MyContainer::get();
        $em = $container->get(EntityManager::class);

        $cartLineDAO = new CartLineDAO($em);

        $productId = 22;
        $cartLineDAO->deleteByProductId($productId);
        $deletedCartLine = $em->getRepository('App\Models\CartLine')->findOneByProductId(['productId' => $productId]);

        $this->assertNull($deletedCartLine);

    }


}