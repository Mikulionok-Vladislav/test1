<?php

namespace App\Request\Employee;

use App\Request\BaseRequest;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Type;

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

    #[Type('array')]
    #[All(
        constraints: new Collection([
            'id'=>[
                new NotBlank(allowNull: true)
            ],
            'email'=>[
                new NotBlank(),
                new NotNull(),
                new Length(max: 50),
                new Email()
            ]
        ])
    )]
    protected array $email;

    #[Type('array')]
    #[All(
        constraints: new Collection([
            'id'=>[
                new NotBlank(allowNull: true)
            ],
            'phone'=>[
                new NotBlank(),
                new NotNull(),
                new Length(max: 50)
            ]
        ])
    )]
    protected array $phone;

    #[NotBlank]
    #[Length(max:255, maxMessage:"Password is too long")]
    protected string $password;

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

    public function getEmail(): array
    {
        return $this->email;
    }

    public function getPhone(): array
    {
        return $this->phone;
    }

    public function getPassword(): string
    {
        return $this->password;
    }


    protected function autoValidateRequest(): bool
    {
        return true;
    }
}