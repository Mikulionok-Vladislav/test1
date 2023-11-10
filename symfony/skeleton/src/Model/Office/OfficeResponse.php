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

    public function setId(int $id): OfficeResponse
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): OfficeResponse
    {
        $this->name = $name;

        return $this;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): OfficeResponse
    {
        $this->address = $address;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): OfficeResponse
    {
        $this->type = $type;

        return $this;
    }

    public function getNumberofstaff(): string
    {
        return $this->numberofstaff;
    }

    public function setNumberofstaff(string $numberofstaff): OfficeResponse
    {
        $this->numberofstaff = $numberofstaff;

        return $this;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): OfficeResponse
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): OfficeResponse
    {
        $this->email = $email;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): OfficeResponse
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): OfficeResponse
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

}