<?php

namespace App\DataFixtures;

use App\Entity\Cabinet;
use App\Entity\EmployeeProductCabinet;
use App\Entity\Office;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EmployeeProductCabinetFixture extends Fixture implements DependentFixtureInterface
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
    public function getRange($className)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $productRepository = $entityManager->getRepository($className);
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
    public function getData($className)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $productRepository = $entityManager->getRepository($className);
        return $productRepository->findOneBy(['id'=>$this->getRange($className)]);
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i = 1; $i <= 200; $i++) {
            $epc = new EmployeeProductCabinet();
            $epc->setDiscription($faker->word);
            $epc->setOperationTime($faker->numberBetween(0,300));
            $epc->setCabinet($this->getData('App\Entity\Cabinet'));
            $epc->setProduct($this->getData('App\Entity\Product'));
            $epc->setEmployee($this->getData('App\Entity\Employee'));
            $manager->persist($epc);


        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [CabinetFixture::class,ProductFixture::class,EmployeeFixture::class];
    }

}
