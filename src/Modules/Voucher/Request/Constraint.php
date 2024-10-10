<?php

namespace App\Modules\Voucher\Request;

use Symfony\Component\Validator\Constraints as Assert;

class Constraint
{
    #[Assert\NotNull]
    #[Assert\NotNull]
    public bool $isValidOnCampaigns;

    #[Assert\Valid]
    #[Assert\NotBlank]
    public ConstraintDate $date;

    #[Assert\Valid]
    #[Assert\NotBlank]
    public ConstraintMaxApplication $maxApplications;

    #[Assert\Valid]
    #[Assert\NotBlank]
    public ConstraintOrderValue $orderValue;
}
