<?php

namespace App\Model\Employee;



class EmailResponse
{
    private  $id;
    private string $email;
    private ?\DateTimeInterface $createdAt;
    private ?\DateTimeInterface $updatedAt;

    public function __construct($id, string $email, ?\DateTimeInterface $createdAt, ?\DateTimeInterface $updatedAt)
    {
        $this->id=$id;
        $this->email=$email;
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
    public function getEmail(): string
    {
        return $this->email;
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