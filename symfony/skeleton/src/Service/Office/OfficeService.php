<?php

namespace App\Service\Office;

use App\Entity\Office;
use App\Model\Office\OfficeResponse;
use App\Request\Office\OfficeRequest;
use Doctrine\ORM\EntityManagerInterface;

class OfficeService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function createOffice(OfficeRequest $request): Office
    {
        $office = new Office();
        $office->setName($request->getName());
        $office->setAddress($request->getAddress());
        $office->setType($request->getType());
        $office->setNumberofstaff($request->getNumberofstaff());
        $office->setPhoneNumber($request->getPhoneNumber());
        $office->setEmail($request->getEmail());

        $this->entityManager->persist($office);

        return $office;
    }

    public function editOffice(Office $office, OfficeRequest $request): Office
    {
        $office->setName($request->getName());
        $office->setAddress($request->getAddress());
        $office->setType($request->getType());
        $office->setNumberofstaff($request->getNumberofstaff());
        $office->setPhoneNumber($request->getPhoneNumber());
        $office->setEmail($request->getEmail());

        return $office;
    }

    public function listOffice(): array
    {
        $office = $this->entityManager->getRepository(Office::class)->findAll();
        $officeList = [];
        foreach ($office as $officeItem) {

            $officeList[] = new OfficeResponse(
                $officeItem->getId(),
                $officeItem->getName(),
                $officeItem->getAddress(),
                $officeItem->getType(),
                $officeItem->getNumberofstaff(),
                $officeItem->getPhoneNumber(),
                $officeItem->getEmail(),
                $officeItem->getCreatedAt(),
                $officeItem->getUpdatedAt(),
            );
        }
        
        return $officeList;
    }

    public function showOffice(Office $office): OfficeResponse
    {
        return new OfficeResponse(
            $office->getId(),
            $office->getName(),
            $office->getAddress(),
            $office->getType(),
            $office->getNumberofstaff(),
            $office->getPhoneNumber(),
            $office->getEmail(),
            $office->getCreatedAt(),
            $office->getUpdatedAt(),
        );
    }
}