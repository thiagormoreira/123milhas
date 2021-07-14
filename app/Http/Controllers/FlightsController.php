<?php

namespace App\Http\Controllers;

use App\Repositories\FlightsRepository;

class FlightsController extends BaseController
{

    /**
     * Retorna lista de voos agrupados
     *
     * @OA\Get(
     *     path="/api/flights",
     *     operationId="showGroupedFlights",
     *     tags={"Flights"},
     *     summary="Retorna lista de voos agrupados",
     *     description="Retorna lista de voos agrupados",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/GroupedFlightsData")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable request"
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Unauthorized"
     *     )
     * )
     *
     * @param String $uuid
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try {
            $repo = new FlightsRepository();

            $groups = $repo->groups();

            return $this->response($groups, 200);
        }
        catch (\Exception $e){

            return $this->response([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
