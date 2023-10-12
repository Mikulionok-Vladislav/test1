<?php

namespace App\DataFixtures;

use App\Entity\Cabinet;
use App\Entity\Employee;
use App\Entity\Office;
use App\Entity\Phone;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;


class PhoneFixture extends Fixture implements DependentFixtureInterface
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
    public function getRange()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $productRepository = $entityManager->getRepository(Employee::class);
        $maxId = $productRepository->createQueryBuilder('p')
            ->select('MAX(p.id)')
            ->getQuery()
            ->getSingleScalarResult();
        $minId = $productRepository->createQueryBuilder('p')
            ->select('MIN(p.id)')
            ->getQuery()
            ->getSingleScalarResult();

        return mt_rand($minId,$maxId);
    }

    /**
     * @throws NonUniqueResultException
     * @throws NoResultException
     */
    public function getEmployee()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $productRepository = $entityManager->getRepository(Employee::class);
        return $productRepository->findOneBy(['id'=>$this->getRange()]);
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i = 1; $i <= 200; $i++) {
            $phone = new Phone();
            $phone->setPhone($faker->phoneNumber);
            $phone->setEmployee($this->getEmployee());
            $manager->persist($phone);


        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            EmployeeFixture::class,
        ];
    }

}