<?php

namespace App\Modules\Voucher\Request;

use Symfony\Component\Validator\Constraints as Assert;

class ConstraintOrderValue
{
    #[Assert\PositiveOrZero]
    #[Assert\LessThan(propertyPath: "max")]
    #[Assert\NotBlank]
    public int $min;

    #[Assert\PositiveOrZero]
    #[Assert\NotBlank]
    public int $max;
}
