<?php

namespace App\DataFixtures;

use App\Entity\Office;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class OfficeFixture extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        for ($i = 1; $i <= 200; $i++) {
            $office = new Office();
            $office->setName($faker->company);
            $office->setAddress($faker->address);
            $office->setPhoneNumber($faker->phoneNumber);
            $office->setEmail($faker->email);
            $manager->persist($office);
        }
        $manager->flush();
    }

}