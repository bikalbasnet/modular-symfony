<?php

namespace App\Modules\Voucher\Request;

use Symfony\Component\Validator\Constraints as Assert;

class ConstraintMaxApplication
{
    #[Assert\Positive]
    #[Assert\NotBlank]
    public int $count;

    #[Assert\Choice(
        choices: ['customer', 'order'],
        message: 'Choose a valid restriction.',
    )]
    #[Assert\NotBlank]
    public string $restriction;
}
