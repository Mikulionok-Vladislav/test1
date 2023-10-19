<?php

namespace App\Model\Employee;

class PhoneResponse
{
    private  $id;
    private string $phone;
    private ?\DateTimeInterface $createdAt;
    private ?\DateTimeInterface $updatedAt;

    public function __construct($id, string $phone, ?\DateTimeInterface $createdAt, ?\DateTimeInterface $updatedAt)
    {
        $this->id=$id;
        $this->phone=$phone;
        $this->createdAt=$createdAt;
        $this->updatedAt=$updatedAt;
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
    public function getPhone(): string
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