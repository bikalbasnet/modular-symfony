<?php

namespace App\Modules\Voucher\Domain\Service;

use App\Modules\Voucher\Persistence\Entity\Voucher;
use App\Modules\Voucher\Persistence\Entity\VoucherConstraint;
use App\Modules\Voucher\Persistence\Repository\VoucherConstraintRepository;
use App\Modules\Voucher\Request\CreateVoucherInput;

class CreateVoucherConstraintService
{
    public function __construct(private readonly VoucherConstraintRepository $voucherConstraintRepository)
    {
    }

    /**
     * @param CreateVoucherInput $input
     * @param Voucher $voucher
     * @return VoucherConstraint[]
     */
    public function createVoucherConstraint(CreateVoucherInput $input, Voucher $voucher): array
    {
        $voucherConstraints = [];

        foreach ($input->criteria as $criteria) {
            $voucherConstraint = new VoucherConstraint();
            $voucherConstraint->setKey($criteria->key);
            $voucherConstraint->setType($criteria->type);

            $voucherConstraint->setValues($criteria->value);
            $voucherConstraint->setVoucher($voucher);

            $voucherConstraints[] = $voucherConstraint;
        }

        $this->voucherConstraintRepository->saveVoucherConstraints($voucherConstraints);

        return $voucherConstraints;
    }
}
