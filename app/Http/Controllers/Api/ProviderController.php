<?php

namespace App\Http\Controllers\Api;

use App\Interfaces\ProviderInterface;
use App\Models\provider;
use Illuminate\Http\Request;

class ProviderController extends ApiBaseController
{
    public function __construct(ProviderInterface $providerInterface)
    {
        $this->providerInterface = $providerInterface;
    }

    /**
     * @OA\Get(
     *     path="/api/transactions",
     *     description="List all transactions",
     *     tags={"transactions"},
     * @OA\Parameter(
     *    description="Limit / data count per page",
     *    in="query",
     *    name="limit",
     *    required=false,
     *    example="10",
     * ),
     * @OA\Parameter(
     *    description="page number",
     *    in="query",
     *    name="page",
     *    required=false,
     *    example="1",
     * ),
     * @OA\Parameter(
     *    description="mobile",
     *    in="query",
     *    name="mobile",
     *    required=false,
     *    example="0020111111111",
     * ),
     * @OA\Parameter(
     *    description="status (paid, pending, reject , 100 , ... )",
     *    in="query",
     *    name="status",
     *    required=false,
     * ),
     * @OA\Parameter(
     *    description="Amount",
     *    in="query",
     *    name="amount",
     *    required=false,
     *    example="150",
     * ),
     * @OA\Parameter(
     *    description="currency",
     *    in="query",
     *    name="currency",
     *    required=false,
     *    example="EGP",
     * ),
     *  @OA\Response(response="default", description="paginated list of vendors")
     * )
    */
    public function transactions(Request $request)
    {
        $transactions    =  $this->providerInterface->transactions($request->all());
        return $this->success($transactions);
    }

    public function applyFilter($data , $request)
    {
        return $this->providerInterface->applyFilter($data , $request);
    }
}
