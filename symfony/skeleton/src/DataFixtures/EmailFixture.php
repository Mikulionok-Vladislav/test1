<?php

namespace App\DataFixtures;

use App\Entity\Cabinet;
use App\Entity\Email;
use App\Entity\Employee;
use App\Entity\Office;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;


class EmailFixture extends Fixture implements DependentFixtureInterface
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
        $employeeRepository = $entityManager->getRepository(Employee::class);
        $maxId = $employeeRepository->createQueryBuilder('p')
            ->select('MAX(p.id)')
            ->getQuery()
            ->getSingleScalarResult();
        $minId = $employeeRepository->createQueryBuilder('p')
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
        $employeeRepository = $entityManager->getRepository(Employee::class);
        return $employeeRepository->findOneBy(['id'=>$this->getRange()]);
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i = 1; $i <= 200; $i++) {
            $email = new Email();
            $email->setEmail($faker->email);
            $email->setEmployee($this->getEmployee());
            $manager->persist($email);


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