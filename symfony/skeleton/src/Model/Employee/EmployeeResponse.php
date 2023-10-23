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
    private $phone;
    private ?\DateTimeInterface $createdAt;
    private ?\DateTimeInterface $updatedAt;
    public function __construct($id,string $firstname, string $lastname, string $middlename, ?\DateTimeInterface $createdAt, ?\DateTimeInterface $updatedAt, array $email, array $phone)
    {
        $this->id=$id;
        $this->firstname=$firstname;
        $this->lastname=$lastname;
        $this->middlename=$middlename;
        $this->createdAt=$createdAt;
        $this->updatedAt=$updatedAt;
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

    public function getUpdatedAt(): \DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }
}