<?php

namespace App\Controller\Authentication;

use App\Request\Employee\EmployeeRequest;
use App\Service\Employee\EmployeeService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


class RegistrationController extends AbstractController
{
    public function __construct(private EntityManagerInterface $entityManager, private EmployeeService $employeeService)
    {

    }
    #[Route('/register', name: 'register', methods: ['POST'])]
    public function index(EmployeeRequest $request): JsonResponse
    {
        $employee = $this->employeeService->createEmployee($request);
        $this->entityManager->flush();

        return $this->json(['message' => 'Registered Successfully']);
    }
}