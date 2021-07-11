<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use phpDocumentor\Reflection\Types\Null_;

class FlightsRepository
{
    private $apiUrl = 'http://prova.123milhas.net/api/flights';
    private $flights;

    /**
     * Acesso API e Coleta de dados
     *
     */
    public function __construct()
    {
        try {
            $response = Http::get($this->apiUrl);
            $this->flights = collect(json_decode($response->body()));
        }
        catch (\Exception $e){
            die($e->getMessage());
        }
    }

    /**
     * Retorna todos os voos
     *
     * @return Collection
     */
    public function all() : Collection
    {
        return $this->flights;
    }

}
