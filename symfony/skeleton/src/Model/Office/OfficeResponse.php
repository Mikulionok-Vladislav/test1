<?php

namespace App\Model\Office;


class OfficeResponse
{
    private int $id;
    private string $name;
    private string $address;
    private string $type;
    private string $numberofstaff;
    private string $phoneNumber;
    private string $email;
    private ?\DateTimeInterface $createdAt;
    private ?\DateTimeInterface $updatedAt;


    public function __construct(
        int                 $id,
        string              $name,
        string              $address,
        string              $type,
        string              $numberofstaff,
        string              $phoneNumber,
        string              $email,
        ?\DateTimeInterface $createdAt,
        ?\DateTimeInterface $updatedAt,



    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->type = $type;
        $this->numberofstaff = $numberofstaff;
        $this->phoneNumber = $phoneNumber;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->email = $email;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getNumberofstaff(): string
    {
        return $this->numberofstaff;
    }

    public function setNumberofstaff(string $numberofstaff): void
    {
        $this->numberofstaff = $numberofstaff;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }


}