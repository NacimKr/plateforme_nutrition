<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $users = new Users();
        $users->setUsername('SandrineAdmin09**')->setPassword('CoupartNutrition1412/*');
        $manager->persist($users);

        $manager->flush();
    }
}
