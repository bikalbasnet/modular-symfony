<?php

namespace App\Modules\Voucher\Domain;

class VoucherConstants
{
    const VOUCHER_TYPE_RELATIVE = "relative";
    const VOUCHER_TYPE_ABSOLUTE = "value";

    const VOUCHER_MAPPINGS_API_DB = [
        self::VOUCHER_TYPE_RELATIVE => 'percent',
        self::VOUCHER_TYPE_ABSOLUTE => 'value'
    ];

    const VOUCHER_STATUS_ACTIVE = "active";
    const VOUCHER_STATUS_INACTIVE = "inactive";
    const VOUCHER_STATUS_PENDING_REVIEW = "pending-review";
    const VOUCHER_STATUS_ARCHIVED = "archived";
}
