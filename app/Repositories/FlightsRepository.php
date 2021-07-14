<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

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
     * Organiza todos os voos em um array para facilitar o tratamento de dados
     *
     */
    public function sortFlights(){
        // Organizar todos os voos

        // Add 'type' outbound/inbound para facilitar o agrupamento
        $this->flights->each(function ($item, $key) {
            if($item->inbound){
                $item->type = 'inbound';
            }
            if($item->outbound){
                $item->type = 'outbound';
            }
        });
        // Fim Add 'type' outbound/inbound para facilitar o agrupamento

        // Agrupar por tarifa
        $fares = $this->flights->groupBy('fare');
        // Fim Agrupar por tarifa

        // Agrupar por ida/volta
        foreach ($fares as $key => $fare) {
            $faresGrouped[$key] = $fare->groupBy('type');
        }
        // Fim Agrupar por ida/volta

        // Agrupar por preço
        foreach ($faresGrouped as $j => $fares){
            foreach ($fares as $k => $fare){
                $faresGrouped[$j][$k] = $fare->groupBy('price');
            }
        }
        // Fim Agrupar por preço

        return $faresGrouped;
    }

    /**
     * Combina e agrupa todos os voos de ida e volta
     *
     */
    public function groupedFlights()
    {
        $sortedFlights = $this->sortFlights();

        // Combina voos de ida e volta
        foreach ($sortedFlights as $item){
            $matrix[] = $item['outbound']->crossJoin($item['inbound']);
        }
        $collectMatrix = collect($matrix);

        $flattenMatrix = $collectMatrix->mapWithKeys(function ($item) {
            return $item;
        });

        return $flattenMatrix;
    }

    /**
     * Formata os grupos com os dados necessarios
     *
     */
    public function formatGroup(){

        $formatedGroups = $this->groupedFlights();

        foreach ($formatedGroups as $curr){

            // Group Price
            $outboundPrice = $curr[0]->first()->price;
            $inboundPrice = $curr[1]->first()->price;
            $totalPrice = $outboundPrice + $inboundPrice;


            $group[] = [
                'uniqueId' => Str::uuid(),
                'totalPrice' => $totalPrice,
                'outbound' => collect($curr[0]),
                'inbound' => collect($curr[1])
            ];

            $collectGroup = collect($group);
        }

        // Remove index keys e ordena por 'totalPrice'
        $flattenCollectGroup = $collectGroup->sortBy('totalPrice')->unique()->values();

        return $flattenCollectGroup;
    }

    /**
     * Formata os grupos com os dados necessarios
     *
     */
    public function groups(){

        $groups = $this->formatGroup();

        $cheapestPrice = $groups->min('totalPrice');
        $cheapestGroup = $groups->firstWhere('totalPrice', $groups->min('totalPrice'));

        $formatedGroups = [
            'flights' => $this->flights,
            'groups' => $groups,
            'totalGroups' => count($groups),
            'totalFlights' => count($this->flights),
            'cheapestPrice' => $cheapestPrice,
            'cheapestGroup' => $cheapestGroup['uniqueId'],

        ];

        return $formatedGroups;
    }

}
