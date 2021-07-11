<?php

namespace App\Http\Controllers;

use App\Repositories\FlightsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

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
            $flights = $repo->all();

            $response = [
                'flights' => $flights,
                'groups' => [],
                'totalGroups' => 0,
                'totalFlights' => count($flights),
                'cheapestPrice' => 0,
                'cheapestGroup' => 0,

            ];

            return $this->response($response, 200);
        }
        catch (\Exception $e){

            return $this->response([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
