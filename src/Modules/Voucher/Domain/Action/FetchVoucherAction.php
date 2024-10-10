<?php

namespace App\Modules\Voucher\Domain\Action;

use App\Modules\Voucher\Persistence\Repository\VoucherRepository;
use App\Modules\Voucher\Response\VoucherCreatedResponse;

class FetchVoucherAction
{
    public function __construct(
        private readonly VoucherRepository $voucherRepository
    )
    {
    }

    public function fetch(int $id): VoucherCreatedResponse
    {
        $voucher = $this->voucherRepository->find(1);

        // TODO

        $voucherResponse = new VoucherCreatedResponse();

        return $voucherResponse;

    }
}
