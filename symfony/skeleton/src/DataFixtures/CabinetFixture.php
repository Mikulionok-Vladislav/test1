<?php

namespace App\DataFixtures;

use App\Entity\Cabinet;
use App\Entity\Office;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;


class CabinetFixture extends Fixture implements DependentFixtureInterface
{
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getDoctrine(): ManagerRegistry
    {
        return $this->doctrine;
    }

    /**
     * @throws NonUniqueResultException
     * @throws NoResultException
     */


    public function load(ObjectManager $manager)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $officeRepository = $entityManager->getRepository(Office::class);
        $offices = $officeRepository->findAll();
        $faker = Factory::create();

        for ($i = 1; $i <= 200; $i++) {
            $cabinet = new Cabinet();
            $cabinet->setName($faker->numberBetween(100,1000));
            $cabinet->setOffice($faker->randomElement($offices));
            $manager->persist($cabinet);


        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            OfficeFixture::class,
        ];
    }

}