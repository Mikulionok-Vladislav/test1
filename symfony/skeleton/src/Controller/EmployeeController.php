<?php

namespace App\Controller;

use App\Entity\Email;
use App\Entity\Employee;
use App\Entity\Phone;
use App\Model\Employee\EmailResponse;
use App\Model\Employee\EmployeeResponse;
use App\Model\Employee\PhoneResponse;
use App\Request\Employee\EmployeeRequest;
use App\Service\Employee\EmployeeService;
use Doctrine\ORM\EntityManagerInterface;
use PhpParser\Node\Expr\Array_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployeeController extends AbstractController
{
    public function __construct(private EntityManagerInterface $entityManager, private EmployeeService $employeeService)
    {

    }

    #[Route('/employee', name: 'employee_list', methods: ['GET'])]
    public function employeeList()
    {
        $employee = $this->entityManager->getRepository(Employee::class)->findAll();

//        $jsonContent = $serializer->serialize($employee, 'json', [
//            'circular_reference_handler' => function ($object) {
//                return $object->getId();
//            }
//        ]);

        return $this->json($employee);
    }

    #[Route('/employee/{id}', name: 'show_employee', methods: ['GET'])]
    public function getEmployee(Employee $employee): JsonResponse
    {
        $response = $this->employeeService->showEmployee($employee);

        return $this->json($response);
    }

    #[Route('/employee', name: 'create_employee', methods: ['POST'])]
    public function createEmployee(EmployeeRequest $request): JsonResponse
    {
        $employee = $this->employeeService->createEmployee($request);
        $this->entityManager->flush();

        return $this->json($employee,JsonResponse::HTTP_CREATED);}


    #[Route('/employee/{id}', name: 'employee_delete', methods: ['DELETE'])]
    public function deleteEmployee(Employee $employee): Response
    {

        $this->entityManager->remove($employee);
        $this->entityManager->flush();

        return $this->json([], JsonResponse::HTTP_NO_CONTENT);
    }

    #[Route('/employee/{id}', name: 'employee_edit', methods: ['PUT'])]
    public function editEmployee(EmployeeRequest $request, Employee $employee): JsonResponse
    {
        $employee = $this->employeeService->editEmployee($employee, $request);
        $this->entityManager->flush();

        return $this->json($employee,JsonResponse::HTTP_ACCEPTED);

    }
}





