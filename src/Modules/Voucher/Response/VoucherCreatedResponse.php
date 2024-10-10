<?php

namespace App\Modules\Voucher\Response;

use Symfony\Component\HttpFoundation\Response;

class VoucherCreatedResponse extends Response
{
    public function __construct()
    {
        parent::__construct(status: 201);
    }
}
