<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;

class ProductFixture extends Fixture
{

    public function load(\Doctrine\Persistence\ObjectManager $manager): void
    {
        $faker = Factory::create();
        for ($i = 1; $i <= 200; $i++) {
            $product = new Product();
            $product->setName($faker->word);
            $product->setPrice($faker->numberBetween(100));
            $manager->persist($product);
        }
        $manager->flush();
    }
}