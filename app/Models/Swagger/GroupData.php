<?php

namespace App\Models\Swagger;

/**
 * @OA\Schema(schema="GroupData")
 */
class GroupData
{
    /**
     * Id
     * @OA\Property(type="string")
     * @var string
     */
    public $uniqueId;

    /**
     * Preço total
     * @OA\Property(type="integer")
     * @var integer
     */
    public $totalPrice;

    /**
     * Voos de Ida
     * @OA\Property(
     *     type="array",
     *     @OA\Items(ref="#/components/schemas/FlightData")
     * )
     * @var array
     */
    public $outbound;

    /**
     * Voos de Volta
     * @OA\Property(
     *     type="array",
     *     @OA\Items(ref="#/components/schemas/FlightData")
     * )
     * @var array
     */
    public $inbound;
}
