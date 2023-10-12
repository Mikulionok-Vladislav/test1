<?php

namespace App\Request\Product;
use App\Request\BaseRequest;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
class ProductRequest extends BaseRequest
{
    #[NotBlank]
    #[Length(max:50, maxMessage:"Name is too long")]
    protected string $name;

    #[NotBlank]
    #[Type('integer')]
    #[GreaterThanOrEqual(value:0, message:"Price must be greater than or equal to 0")]
    #[Range(notInRangeMessage: "The value must be between {{ min }} and {{ max }}",
        invalidMessage: "Value must be a number",
        min: 1,
        max: 10000000)]
    protected int $price;

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    protected function autoValidateRequest(): bool
    {
        return true;
    }
}