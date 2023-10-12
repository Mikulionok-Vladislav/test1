<?php

namespace App\Request\Employee;
use App\Request\BaseRequest;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class EmployeeRequest extends BaseRequest
{
    #[NotBlank]
    #[Length(max:50, maxMessage:"Name is too long")]
    protected string $firstname;

    #[NotBlank]
    #[Length(max:50, maxMessage:"Name is too long")]
    protected string $lastname;

    #[NotBlank]
    #[Length(max:50, maxMessage:"Name is too long")]
    protected string $middlename;

    public function getMiddlename(): string
    {
        return $this->middlename;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }


    protected function autoValidateRequest(): bool
    {
        return true;
    }
}