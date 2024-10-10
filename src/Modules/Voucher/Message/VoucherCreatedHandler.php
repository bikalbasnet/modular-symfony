<?php

namespace App\Modules\Voucher\Message;

use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
/**
 * TODO Can be deleted later.
 * This file is created as a Proof Of Concept for using symfony message bus instead of event
 * as it gives us capability of handing the commands in both sync and async way
 */
class VoucherCreatedHandler
{
    public function __invoke(VoucherCreated $voucher): void
    {
    }
}
