<?php

namespace App\Service\Cabinet;

use App\Entity\Cabinet;
use App\Request\Cabinet\CabinetRequest;
use Doctrine\ORM\EntityManagerInterface;

class CabinetService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }
    public function createCabinet(CabinetRequest $request): Cabinet
    {
        $cabinet = new Cabinet();
        $cabinet->setName($request->getName());
        $cabinet->setOffice($request->getOffice());

        $this->entityManager->persist($cabinet);

        return $cabinet;
    }

    public function editCabinet(Cabinet $cabinet, CabinetRequest $request): Cabinet
    {
        $cabinet->setName($request->getName());
        $cabinet->setOffice($request->getOffice());

        return $cabinet;
    }
}