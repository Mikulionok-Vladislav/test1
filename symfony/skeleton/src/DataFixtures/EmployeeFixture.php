<?php

namespace App\DataFixtures;

use App\Entity\Employee;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;

class EmployeeFixture extends Fixture
{
    public function load(\Doctrine\Persistence\ObjectManager $manager): void
    {
        $faker = Factory::create();
        for ($i = 1; $i <= 200; $i++) {
            $employee = new Employee();
            $employee->setFirstname($faker->firstName);
            $employee->setLastname($faker->lastName);
            $employee->setMiddlename($faker->userName);
            $manager->persist($employee);
        }
        $manager->flush();
    }
}