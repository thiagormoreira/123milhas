<?php

namespace App\Models\Swagger;

/**
 * @OA\Schema(schema="FlightData")
 */
class FlightData
{
    /**
     * Id
     * @OA\Property(type="integer")
     * @var integer
     */
    public $id;

    /**
     * Companhia aérea
     * @OA\Property(type="string")
     * @var string
     */
    public $cia;

    /**
     * Tarifa
     * @OA\Property(type="string")
     * @var string
     */
    public $fare;

    /**
     * Número do voo
     * @OA\Property(type="string")
     * @var string
     */
    public $flightNumber;

    /**
     * Origem do voo
     * @OA\Property(type="string")
     * @var string
     */
    public $origin;

    /**
     * Destino do voo
     * @OA\Property(type="string")
     * @var string
     */
    public $destination;

    /**
     * Data de saida
     * @OA\Property(
     *     type="string",
     *     format="date"
     * )
     * @var string
     */
    public $departureDate;

    /**
     * Data de chegada
     * @OA\Property(
     *     type="string",
     *     format="date"
     * )
     * @var string
     */
    public $arrivalDate;

    /**
     * Hora de saida
     * @OA\Property(type="string")
     * @var string
     */
    public $departureTime;

    /**
     * Hora de chegada
     * @OA\Property(type="string")
     * @var string
     */
    public $arrivalTime;

    /**
     * Classe
     * @OA\Property(type="integer")
     * @var integer
     */
    public $classService;

    /**
     * Preço
     * @OA\Property(
     *     type="number",
     *     format="double"
     * )
     * @var integer
     */
    public $price;

    /**
     * Imposto
     * @OA\Property(
     *     type="number",
     *     format="double"
     * )
     * @var integer
     */
    public $tax;

    /**
     * Ida
     * @OA\Property(type="boolean")
     * @var boolean
     */
    public $outbound;

    /**
     * Volta
     * @OA\Property(type="boolean")
     * @var boolean
     */
    public $inbound;

    /**
     * Duração do voo
     * @OA\Property(type="string")
     * @var string
     */
    public $duration;
}
