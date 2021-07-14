<?php

namespace App\Models\Swagger;

/**
 * @OA\Schema(schema="GroupedFlightsData")
 */
class GroupedFlightsData
{
    /**
     * Voos
     * @OA\Property(
     *     type="array",
     *     @OA\Items(ref="#/components/schemas/FlightData")
     * )
     * @var array
     */
    public $flights;

    /**
     * Grupos de voos
     * @OA\Property(
     *     type="array",
     *     @OA\Items(ref="#/components/schemas/GroupData")
     * )
     * @var array
     */
    public $groups;

    /**
     * Total de grupos
     * @OA\Property(type="integer")
     * @var integer
     */
    public $totalGroups;

    /**
     * Total de voos
     * @OA\Property(type="integer")
     * @var integer
     */
    public $totalFlights;

    /**
     * Preço do grupo mais barato
     * @OA\Property(
     *     type="number",
     *     format="double"
     * )
     * @var integer
     */
    public $cheapestPrice;

    /**
     * Id do grupo mais barato
     * @OA\Property(type="integer")
     * @var integer
     */
    public $cheapestGroup;
}
