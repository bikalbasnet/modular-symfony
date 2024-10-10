<?php

namespace App\Modules\Voucher\Domain\Action;

use App\Modules\Voucher\Domain\Service\CreateVoucherConstraintService;
use App\Modules\Voucher\Domain\Service\CreateVoucherService;
use App\Modules\Voucher\Message\VoucherCreated;
use App\Modules\Voucher\Request\CreateVoucherInput;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class CreateVoucherAction
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly CreateVoucherService $createVoucherService,
        private readonly CreateVoucherConstraintService $createVoucherConstraintService,
        private readonly MessageBusInterface $bus,
    )
    {
    }

    /**
     * @throws \Doctrine\DBAL\Exception|\Exception
     */
    public function create(CreateVoucherInput $input): bool
    {
        $this->entityManager->beginTransaction();

        try {
            $voucher = $this->createVoucherService->createVoucher($input);
            $voucherConstraints = $this->createVoucherConstraintService->createVoucherConstraint($input, $voucher);

            $this->bus->dispatch(new VoucherCreated($voucher));
            $this->entityManager->commit();
        } catch (\Exception $exception) {
            $this->entityManager->rollBack();
            throw $exception;
        }

        return true;
    }
}
