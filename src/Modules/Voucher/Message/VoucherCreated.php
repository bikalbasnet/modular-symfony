<?php

namespace App\Modules\Voucher\Message;

use App\Modules\Voucher\Persistence\Entity\Voucher;

class VoucherCreated
{
    private Voucher $voucher;

    /**
     * @param Voucher $voucher
     */
    public function __construct(Voucher $voucher)
    {
        $this->voucher = $voucher;
    }
}
