<?php

namespace App\Model\Employee;

use Doctrine\Common\Collections\Collection;

class EmployeeResponse
{
    private int $id;
    private string $firstname;
    private string $lastname;
    private string $middlename;

    /** @var EmailResponse[]  */
    private  $email;

    /** @var PhoneResponse[]  */
    private array $phone;
    public function __construct($id,string $firstname, string $lastname, string $middlename, array $email, array $phone)
    {
        $this->id=$id;
        $this->firstname=$firstname;
        $this->lastname=$lastname;
        $this->middlename=$middlename;
        $this->email=$email;
        $this->phone=$phone;
    }


    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function getMiddlename(): string
    {
        return $this->middlename;
    }

    public function getPhone(): array
    {
        return $this->phone;
    }
}