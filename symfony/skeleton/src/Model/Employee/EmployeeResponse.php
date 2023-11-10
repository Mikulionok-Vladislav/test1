<?php

namespace App\Model\Employee;

class EmployeeResponse
{
    private int $id;
    private string $firstname;
    private string $lastname;
    private string $middlename;

    /** @var EmailResponse[]  */
    private array $email;

    /** @var PhoneResponse[]  */
    private array $phone;
    private ?\DateTimeInterface $createdAt;
    private ?\DateTimeInterface $updatedAt;
    public function __construct(
        int $id,
        string $firstname,
        string $lastname,
        string $middlename,
        ?\DateTimeInterface $createdAt,
        ?\DateTimeInterface $updatedAt,
        array $email,
        array $phone
    ){
        $this->id=$id;
        $this->firstname=$firstname;
        $this->lastname=$lastname;
        $this->middlename=$middlename;
        $this->createdAt=$createdAt;
        $this->updatedAt=$updatedAt;
        $this->email=$email;
        $this->phone=$phone;
    }


    public function getEmail(): array
    {
        return $this->email;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

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