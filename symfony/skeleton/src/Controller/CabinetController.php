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

class CabinetController extends AbstractController
{
    public function __construct(private EntityManagerInterface $entityManager, private CabinetService $cabinetService)
    {

    }

    #[Route('/cabinet', name: 'cabinet_list', methods: ['GET'])]
    public function cabinetList():JsonResponse
    {
        $cabinet = $this->entityManager->getRepository(Cabinet::class)->findAll();

        return $this->json($cabinet);
    }

    #[Route('/cabinet/{id}', name: 'show_cabinet', methods: ['GET'])]
    public function getCabinet(Cabinet $cabinet): JsonResponse
    {
        return $this->json($cabinet);
    }

    #[Route('/cabinet', name: 'create_cabinet', methods: ['POST'])]
    public function createCabinet(CabinetRequest $request): JsonResponse
    {
        $cabinet = $this->cabinetService->createCabinet($request);
        $this->entityManager->flush();

        return $this->json($cabinet,JsonResponse::HTTP_CREATED);}


    #[Route('/cabinet/{id}', name: 'cabinet_delete', methods: ['DELETE'])]
    public function deleteCabinet(Cabinet $cabinet): Response
    {
        $this->entityManager->remove($cabinet);
        $this->entityManager->flush();

        return $this->json([], JsonResponse::HTTP_NO_CONTENT);
    }

    #[Route('/cabinet/{id}', name: 'cabinet_edit', methods: ['PUT'])]
    public function editCabinet(CabinetRequest $request, Cabinet $cabinet): JsonResponse
    {
        $cabinet = $this->cabinetService->editCabinet($cabinet, $request);
        $this->entityManager->flush();

        return $this->json($cabinet,JsonResponse::HTTP_ACCEPTED);

    }
}





