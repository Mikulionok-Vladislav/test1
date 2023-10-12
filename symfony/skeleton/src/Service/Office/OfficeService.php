<?php

namespace App\Service\Office;

use App\Entity\Office;
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
}