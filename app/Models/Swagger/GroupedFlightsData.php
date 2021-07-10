<?php

namespace App\Models\Swagger;

/**
 * @OA\Schema(schema="GroupedFlightsData")
 */
class GroupedFlightsData
{
    /**
     * Id
     * @OA\Property(type="string")
     * @var string
     */
    public $flights;
}
