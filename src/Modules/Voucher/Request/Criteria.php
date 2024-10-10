<?php

namespace App\Modules\Voucher\Request;

use Symfony\Component\Validator\Constraints as Assert;

class Criteria
{
    #[Assert\NotBlank]
    #[Assert\Choice(
        choices: [
            'base_category_id',
            'category_id',
            'customer_id',
            'email_hash',
            'app_id',
            'brand_id',
            'product_id',
            'merchant_id',
            'customer_group'
        ],
        message: 'Choose a valid key.',
    )]
    public string $key;

    #[Assert\NotBlank]
    #[Assert\Choice(choices: [
        'black',
        'white'
    ])]
    public string $type;

    /**
     * @var int[]
     */
    #[Assert\All([
        new Assert\Type('integer')
    ])]
    #[Assert\NotBlank]
    public array $value;
}
