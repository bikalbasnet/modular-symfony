<?php

namespace App\Modules\Voucher\Request;

use App\Infrastructure\ParamConverter\RequestDataTransferObject;
use Symfony\Component\Validator\Constraints as Assert;

class CreateVoucherInput implements RequestDataTransferObject
{
    #[Assert\NotBlank]
    #[Assert\Length(max: 50)]
    public string $code;

    #[Assert\NotBlank]
    public string $name;

    #[Assert\Choice(
        choices: ['active', 'inactive', 'pending-review', 'archived'],
        message: 'Choose a valid status.',
    )]
    public string $status;

    public string $summary;

    #[Assert\Choice(
        choices: ['absolute', 'relative'],
        message: 'Type can be absolute or relative',
    )]
    public string $type;

    #[Assert\Type('float')]
    #[Assert\Expression(
        "(this.type == 'relative' and this.value > 0 and this.value < 1) or this.type == 'absolute'",
        message: 'Value must be between 0 and 1 for relative voucher',
    )]
    public float $value;

    #[Assert\Valid]
    public Constraint $constraints;

    /**
     * @var Criteria[]
     */
    #[Assert\Valid]
    public array $criteria;
}
