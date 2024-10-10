<?php

namespace App\Modules\Voucher\Domain\Service;

use App\Modules\Voucher\Domain\VoucherConstants;
use App\Modules\Voucher\Persistence\Entity\Voucher;
use App\Modules\Voucher\Persistence\Repository\VoucherRepository;
use App\Modules\Voucher\Request\CreateVoucherInput;

class CreateVoucherService
{
    public function __construct(private readonly VoucherRepository $voucherRepository)
    {
    }

    public function createVoucher(CreateVoucherInput $input): Voucher
    {
        $voucher = new Voucher();

        $voucher->setName($input->name);
        $voucher->setStatus($input->status);
        $voucher->setSummary($input->summary);
        $voucher->setActive($input->status === "active");
        $voucher->setType($this->translateApiVoucherTypeToDBType($input->type));

        $voucher->setStartDate(new \DateTime($input->constraints->date->min));
        $voucher->setEndDate(new \DateTime($input->constraints->date->max));
        $voucher->setActiveOnCampaign($input->constraints->isValidOnCampaigns);
        $voucher->setUsageLimit($input->constraints->maxApplications->count);
        $voucher->setUsageLimitRestriction($input->constraints->maxApplications->restriction);
        $voucher->setOrderMinAmount($input->constraints->orderValue->min);
        $voucher->setOrderMaxAmount($input->constraints->orderValue->max);

        $reductionValue = $this->translateDecimalVoucherValueToPercentage($input->type, $input->value);
        $voucher->setReductionValue($reductionValue);

        $this->voucherRepository->saveVoucher($voucher);

        return $voucher;
    }

    private function translateApiVoucherTypeToDBType(string $type): string
    {
        return VoucherConstants::VOUCHER_MAPPINGS_API_DB[$type];
    }

    private function translateDecimalVoucherValueToPercentage(string $type, float $value): float
    {
        if ($type === VoucherConstants::VOUCHER_TYPE_ABSOLUTE) {
            return $value;
        }

        return round($value, 2) * 100;
    }
}
