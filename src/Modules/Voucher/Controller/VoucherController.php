<?php

namespace App\Modules\Voucher\Controller;

use App\Modules\Voucher\Domain\Action\CreateVoucherAction;
use App\Modules\Voucher\Domain\Action\FetchVoucherAction;
use App\Modules\Voucher\Request\CreateVoucherInput;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;
use Nelmio\ApiDocBundle\Annotation\Model;
use App\Modules\Voucher\Response\VoucherCreatedResponse;

#[Route('/api/voucher')]
class VoucherController extends AbstractController
{
    #[Route('/v1/create', methods: ['POST'])]
    /**
     * @OA\Tag(name="Voucher")
     * @OA\RequestBody(@Model(type=CreateVoucherInput::class))
     * @OA\Response(
     *     response=200,
     *     description="Voucher Created",
     *     @Model(type=VoucherCreatedResponse::class, groups={"public"})
     * )
     * @OA\Response(
     *     response=422,
     *     description="Validation Error"
     * )
     */
    public function createVoucher(
        CreateVoucherInput  $input,
        CreateVoucherAction $createVoucherAction
    ): VoucherCreatedResponse
    {
        $createVoucherAction->create($input);

        return new VoucherCreatedResponse();
    }

    #[Route('/v1/fetch/{id}', methods: ['GET'])]
    /**
     * @OA\Tag(name="Voucher")
     */
    public function fetchVoucher(int $id, FetchVoucherAction $fetchVoucherAction): JsonResponse
    {
        $voucher = $fetchVoucherAction->fetch($id);

        return $this->json($voucher);
    }
}
