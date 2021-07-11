<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class FlightsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_flights_contoller_returns_200()
    {
        $response = $this->get('/api/flights');

        $response
            ->assertJson(fn (AssertableJson $json) =>
            $json->has('flights')
                ->has('groups')
                ->has('totalGroups')
                ->has('totalFlights')
                ->has('cheapestPrice')
                ->has('cheapestGroup')
            )
            ->assertStatus(200);
    }
}
