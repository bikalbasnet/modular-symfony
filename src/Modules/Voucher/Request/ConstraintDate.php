<?php

namespace App\Modules\Voucher\Request;

use Symfony\Component\Validator\Constraints as Assert;

class ConstraintDate
{
    #[Assert\DateTime(\DateTimeInterface::RFC3339)]
    #[Assert\LessThan(propertyPath: "max")]
    #[Assert\NotBlank]
    public string $min;

    #[Assert\DateTime(\DateTimeInterface::RFC3339)]
    #[Assert\NotBlank]
    public string $max;
}
