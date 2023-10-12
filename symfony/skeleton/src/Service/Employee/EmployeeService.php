<?php

namespace App\Service\Employee;

use App\Entity\Employee;
use App\Request\Employee\EmployeeRequest;

class EmployeeService
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }
    public function createEmployee(EmployeeRequest $request): Employee
    {
        $employee = new Employee();
        $employee->setFirstname($request->getFirstname());
        $employee->setLastname($request->getLastname());
        $employee->setMiddlename($request->getMiddlename());

        $this->entityManager->persist($employee);
        return $employee;
    }

    public function editEmployee(Employee $employee, EmployeeRequest $request): Employee
    {
        $employee->setFirstname($request->getFirstname());
        $employee->setLastname($request->getLastname());
        $employee->setMiddlename($request->getMiddlename());

        return $employee;
    }
}