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
use Symfony\Component\Security\Http\Attribute\IsGranted;

class OfficeController extends AbstractController
{
    public function __construct(private EntityManagerInterface $entityManager, private OfficeService $officeService)
    {

    }

    #[Route('/office', name: 'office_list', methods: ['GET'])]
    #[IsGranted('list', '')]
    public function officeList():JsonResponse
    {
        $office = $this->entityManager->getRepository(Office::class)->findAll();
        $response = $this->officeService->listOffice($office);
        return $this->json($response);
    }

    #[Route('/office/{id}', name: 'show_office', methods: ['GET'])]
    #[IsGranted('view', 'office')]
    public function getOffice(Office $office): JsonResponse
    {
        $response = $this->officeService->showOffice($office);
        return $this->json($response);
    }

    #[Route('/office', name: 'create_office', methods: ['POST'])]
    #[IsGranted('create', 'request')]
    public function createOffice(OfficeRequest $request): JsonResponse
    {
        $office = $this->officeService->createOffice($request);
        $this->entityManager->flush();

        return $this->json($office,JsonResponse::HTTP_CREATED);
    }


    #[Route('/office/{id}', name: 'office_delete', methods: ['DELETE'])]
    #[IsGranted('delete', 'employee')]
    public function deleteOffice(Office $office): Response
    {
        $this->entityManager->remove($office);
        $this->entityManager->flush();

        return $this->json([], JsonResponse::HTTP_NO_CONTENT);
    }

    #[Route('/office/{id}', name: 'office_edit', methods: ['PUT'])]
    #[IsGranted('edit', 'request')]
    public function editOffice(OfficeRequest $request, Office $office): JsonResponse
    {
        $office = $this->officeService->editoffice($office, $request);
        $this->entityManager->flush();

        return $this->json($office,JsonResponse::HTTP_ACCEPTED);

    }
}





