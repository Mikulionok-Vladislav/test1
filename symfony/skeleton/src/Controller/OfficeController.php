<?php

namespace App\Controller;

use App\Entity\Office;
use App\Request\Office\OfficeRequest;
use App\Service\Office\OfficeService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OfficeController extends AbstractController
{
    public function __construct(private EntityManagerInterface $entityManager, private OfficeService $officeService)
    {

    }

    #[Route('/office', name: 'office_list', methods: ['GET'])]
    public function officeList():JsonResponse
    {
        $office = $this->entityManager->getRepository(Office::class)->findAll();

        return $this->json($office);
    }

    #[Route('/office/{id}', name: 'show_office', methods: ['GET'])]
    public function getOffice(Office $office): JsonResponse
    {
        return $this->json($office);
    }

    #[Route('/office', name: 'create_office', methods: ['POST'])]
    public function createOffice(OfficeRequest $request): JsonResponse
    {
        $office = $this->officeService->createOffice($request);
        $this->entityManager->flush();

        return $this->json($office,JsonResponse::HTTP_CREATED);
    }


    #[Route('/office/{id}', name: 'office_delete', methods: ['DELETE'])]
    public function deleteOffice(Office $office): Response
    {
        $this->entityManager->remove($office);
        $this->entityManager->flush();

        return $this->json([], JsonResponse::HTTP_NO_CONTENT);
    }

    #[Route('/office/{id}', name: 'office_edit', methods: ['PUT'])]
    public function editOffice(OfficeRequest $request, Office $office): JsonResponse
    {
        $office = $this->officeService->editoffice($office, $request);
        $this->entityManager->flush();

        return $this->json($office,JsonResponse::HTTP_ACCEPTED);

    }
}





