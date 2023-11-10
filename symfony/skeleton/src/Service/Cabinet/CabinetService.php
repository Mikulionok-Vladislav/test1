<?php

namespace App\Service\Cabinet;

use App\Entity\Cabinet;
use App\Model\Cabinet\CabinetResponse;
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

    public function listCabinet(): array
    {
        $cabinet = $this->entityManager->getRepository(Cabinet::class)->findAll();
        $cabinetList = [];
        foreach ($cabinet as $cabinetItem){

            $cabinetList[] =  new CabinetResponse(
                $cabinetItem->getId(),
                $cabinetItem->getName(),
                $cabinetItem->getCreatedAt(),
                $cabinetItem->getUpdatedAt(),
            );
        }
        return $cabinetList;
    }
    public function showCabinet(Cabinet $cabinet):CabinetResponse
    {
        return new CabinetResponse(
            $cabinet->getId(),
            $cabinet->getName(),
            $cabinet->getCreatedAt(),
            $cabinet->getUpdatedAt(),
        );
    }
}