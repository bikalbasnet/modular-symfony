<?php

namespace App\Modules\Voucher\Persistence\Entity;

use App\Modules\Voucher\Persistence\Repository\VoucherConstraintRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoucherConstraintRepository::class)]

class VoucherConstraint
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', length: 11)]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Voucher::class, inversedBy: 'voucherConstraints')]
    #[ORM\JoinColumn(nullable: false, onDelete: "cascade")]
    private ?Voucher $voucher;

    #[ORM\Column(name: "`type`", type: 'string', length: 100, options: ['default' => ''])]
    private string $type;

    #[ORM\Column(name: "`key`", type: 'string', length: 100, options: ['default' => ''])]
    private string $key;

    #[ORM\Column(name: "`values`", type: 'json')]
    private array $values = [];

    #[ORM\Column(type: 'string', length: 100, nullable: true, options: ['default' => null])]
    private String $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVoucher(): ?Voucher
    {
        return $this->voucher;
    }

    public function setVoucher(?Voucher $voucher): self
    {
        $this->voucher = $voucher;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getKey(): ?string
    {
        return $this->key;
    }

    public function setKey(?string $key): self
    {
        $this->key = $key;

        return $this;
    }

    public function getValues(): ?array
    {
        return $this->values;
    }

    public function setValues(array $values): self
    {
        $this->values = $values;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
