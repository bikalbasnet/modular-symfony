<?php

namespace App\Modules\Voucher\Persistence\Repository;

use App\Modules\Voucher\Persistence\Entity\VoucherConstraint;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VoucherConstraint|null find($id, $lockMode = null, $lockVersion = null)
 * @method VoucherConstraint|null findOneBy(array $criteria, array $orderBy = null)
 * @method VoucherConstraint[]    findAll()
 * @method VoucherConstraint[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoucherConstraintRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VoucherConstraint::class);
    }

    /**
     * @param VoucherConstraint[] $voucherConstraints
     * @return void
     */
    public function saveVoucherConstraints(array $voucherConstraints): void
    {
        $em = $this->getEntityManager();

        foreach ($voucherConstraints as $voucherConstraint)
        {
            $em->persist($voucherConstraint);
        }

        $em->flush();
    }
}
