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

        foreach ($request->getEmail() as $key) {
            $email = new Email();
            $email->setEmail($key['email']);
            $email->setEmployee($employee);
            $this->entityManager->persist($email);
        }

        foreach ($request->getPhone() as $key) {
            $phone = new Phone();
            $phone->setPhone($key['phone']);
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

        foreach ($request->getEmail() as $key) {
            if ($key['id']) {
                $email = $this->entityManager->getRepository(Email::class)->find($key['id']);
                $email->setEmail($key['email']);
            } else {
                $email = new Email();
                $email->setEmail($key['email']);
                $email->setEmployee($employee);
                $this->entityManager->persist($email);
            }
        }

        foreach ($request->getPhone() as $key) {
            if ($key['id']) {
                $phone = $this->entityManager->getRepository(Phone::class)->find($key['id']);
                $phone->setPhone($key['phone']);
            } else {
                $phone = new Phone();
                $phone->setPhone($key['phone']);
                $phone->setEmployee($employee);
                $this->entityManager->persist($phone);
            }
        }


        return $employee;
    }
}