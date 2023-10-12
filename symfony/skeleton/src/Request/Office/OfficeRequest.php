<?php

namespace App\Request\Office;
use App\Request\BaseRequest;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
class OfficeRequest extends BaseRequest
{
    #[NotBlank]
    #[Length(max:80, maxMessage:"Name is too long")]
    protected string $name;

    #[NotBlank]
    #[Length(max:80, maxMessage:"Name is too long")]
    protected string $address;

    #[Length(max:30, maxMessage:"Name is too long")]
    protected string $type;

    #[Length(max:30, maxMessage:"Name is too long")]
    protected string $numberofstaff;

    #[Length(max:30, maxMessage:"Name is too long")]
    protected string $phoneNumber;

    #[Length(max:30, maxMessage:"Name is too long")]
    protected string $email;

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getNumberofstaff(): string
    {
        return $this->numberofstaff;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function getEmail(): string
    {
        return $this->email;
    }


    protected function autoValidateRequest(): bool
    {
        return true;
    }
}