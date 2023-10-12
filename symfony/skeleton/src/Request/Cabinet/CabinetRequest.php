<?php

namespace App\Request\Cabinet;

use App\Request\BaseRequest;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

class CabinetRequest extends BaseRequest
{
    #[NotBlank]
    #[Length(max:30, maxMessage:"Name is too long")]
    protected string $name;

    #[NotBlank]
    #[Type('integer')]
    protected int $office;

    public function getName(): string
    {
        return $this->name;
    }

    public function getOffice(): int
    {
        return $this->office;
    }

    protected function autoValidateRequest(): bool
    {
        return true;
    }
}