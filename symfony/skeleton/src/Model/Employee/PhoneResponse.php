<?php

namespace App\Model\Employee;

class PhoneResponse
{
    private  $id;
    private string $email;

    public function __construct($id, string $email)
    {
        $this->id=$id;
        $this->email=$email;
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
}