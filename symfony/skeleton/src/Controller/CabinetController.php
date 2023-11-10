<?php

namespace App\Controller;

use App\Entity\Cabinet;
use App\Request\Cabinet\CabinetRequest;
use App\Service\Cabinet\CabinetService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class CabinetController extends AbstractController
{
    public function __construct(private EntityManagerInterface $entityManager, private CabinetService $cabinetService)
    {

    }

    #[Route('/cabinet', name: 'cabinet_list', methods: ['GET'])]
    #[IsGranted('list', '')]
    public function cabinetList():JsonResponse
    {
        $response = $this->cabinetService->listCabinet();
        return $this->json($response);
    }

    #[Route('/cabinet/{id}', name: 'show_cabinet', methods: ['GET'])]
    #[IsGranted('view', 'cabinet')]
    public function getCabinet(Cabinet $cabinet): JsonResponse
    {
        $response = $this->cabinetService->showCabinet($cabinet);
        return $this->json($response);
    }

    #[Route('/cabinet', name: 'create_cabinet', methods: ['POST'])]
    #[IsGranted('create', 'request')]
    public function createCabinet(CabinetRequest $request): JsonResponse
    {
        $cabinet = $this->cabinetService->createCabinet($request);
        $this->entityManager->flush();

        return $this->json($cabinet,JsonResponse::HTTP_CREATED);}


    #[Route('/cabinet/{id}', name: 'cabinet_delete', methods: ['DELETE'])]
    #[IsGranted('delete', 'cabinet')]
    public function deleteCabinet(Cabinet $cabinet): Response
    {
        $this->entityManager->remove($cabinet);
        $this->entityManager->flush();

        return $this->json([], JsonResponse::HTTP_NO_CONTENT);
    }

    #[Route('/cabinet/{id}', name: 'cabinet_edit', methods: ['PUT'])]
    #[IsGranted('edit', 'request')]
    public function editCabinet(CabinetRequest $request, Cabinet $cabinet): JsonResponse
    {
        $cabinet = $this->cabinetService->editCabinet($cabinet, $request);
        $this->entityManager->flush();

        return $this->json($cabinet,JsonResponse::HTTP_ACCEPTED);

    }
}





