<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Request\Employee\EmployeeRequest;
use App\Service\Employee\EmployeeService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class EmployeeController extends AbstractController
{
    public function __construct(private EntityManagerInterface $entityManager, private EmployeeService $employeeService)
    {

    }

    #[Route('/employee', name: 'employee_list', methods: ['GET'])]
    public function employeeList():JsonResponse
    {
        $employee = $this->entityManager->getRepository(Employee::class)->findAll();
        $response = $this->employeeService->listEmployee($employee);
        return $this->json($response);
    }

    #[Route('/employee/{id}', name: 'show_employee', methods: ['GET'])]
    #[IsGranted('view', 'employee')]
    public function getEmployee(Employee $employee): JsonResponse
    {
        $response = $this->employeeService->showEmployee($employee);
        return $this->json($response);
    }

    #[Route('/employee', name: 'create_employee', methods: ['POST'])]
    #[IsGranted('create', 'request')]
    public function createEmployee(EmployeeRequest $request): JsonResponse
    {
        $employee = $this->employeeService->createEmployee($request);
        $this->entityManager->flush();
        return $this->json($this->employeeService->showEmployee($employee), JsonResponse::HTTP_CREATED);}


    #[Route('/employee/{id}', name: 'employee_delete', methods: ['DELETE'])]
    #[IsGranted('delete', 'employee')]
    public function deleteEmployee(Employee $employee): Response
    {

        $this->entityManager->remove($employee);
        $this->entityManager->flush();

        return $this->json([], JsonResponse::HTTP_NO_CONTENT);
    }

    #[Route('/employee/{id}', name: 'employee_edit', methods: ['PUT'])]
    #[IsGranted('edit', 'employee')]
    public function editEmployee(EmployeeRequest $request, Employee $employee): JsonResponse
    {
        $employee = $this->employeeService->editEmployee($employee, $request);
        $this->entityManager->flush();

        return $this->json($this->employeeService->showEmployee($employee),JsonResponse::HTTP_ACCEPTED);

    }
}





