<?php

namespace App\Service\Employee;

use App\Entity\Email;
use App\Entity\Employee;
use App\Entity\Phone;
use App\Model\Employee\EmailResponse;
use App\Model\Employee\EmployeeResponse;
use App\Model\Employee\PhoneResponse;
use App\Request\Employee\EmployeeRequest;
use Doctrine\ORM\EntityManagerInterface;

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

        foreach ($request->getEmail() as $emailItem) {
            $email = new Email();
            $email->setEmail($emailItem['email']);
            $email->setEmployee($employee);
            $this->entityManager->persist($email);
        }

        foreach ($request->getPhone() as $phoneItem) {
            $phone = new Phone();
            $phone->setPhone($phoneItem['phone']);
            $phone->setEmployee($employee);
            $this->entityManager->persist($phone);
        }

        return $employee;
    }

    public function showEmployee(Employee $employee): EmployeeResponse
    {
        $emails = [];
        foreach ($employee->getEmail() as $email) {
            $emails[] = new EmailResponse($email->getId(), $email->getEmail(), $email->getCreatedAt(), $email->getUpdatedAt());
        }
        $phones = [];
        foreach ($employee->getPhone() as $phone) {
            $phones[] = new PhoneResponse($phone->getId(), $phone->getPhone(), $phone->getCreatedAt(), $phone->getUpdatedAt());
        }
        return new EmployeeResponse(
            $employee->getId(),
            $employee->getFirstname(),
            $employee->getLastname(),
            $employee->getMiddlename(),
            $employee->getCreatedAt(),
            $employee->getUpdatedAt(),
            $emails,
            $phones
        );
    }

    public function editEmployee(Employee $employee, EmployeeRequest $request): Employee
    {
        $employee->setFirstname($request->getFirstname());
        $employee->setLastname($request->getLastname());
        $employee->setMiddlename($request->getMiddlename());

        foreach ($request->getEmail() as $emailItem) {
            if ($emailItem['id']) {
                $email = $this->entityManager->getRepository(Email::class)->find($emailItem['id']);
                $email->setEmail($emailItem['email']);
            } else {
                $email = new Email();
                $email->setEmail($emailItem['email']);
                $email->setEmployee($employee);
                $this->entityManager->persist($email);
            }
        }

        foreach ($request->getPhone() as $phoneItem) {
            if ($phoneItem['id']) {
                $phone = $this->entityManager->getRepository(Phone::class)->find($phoneItem['id']);
                $phone->setPhone($phoneItem['phone']);
            } else {
                $phone = new Phone();
                $phone->setPhone($phoneItem['phone']);
                $phone->setEmployee($employee);
                $this->entityManager->persist($phone);
            }
        }

        return $employee;
    }
}