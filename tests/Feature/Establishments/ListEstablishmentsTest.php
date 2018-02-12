<?php

namespace Tests\Feature\Establishments;

use App\Establishments\Establishment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListEstablishmentsTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     *@test
     */
    public function a_list_of_establishments_can_be_fetched()
    {
        $establishments = factory(Establishment::class, 10)->create(['published' => true]);

        $response = $this->json("GET", '/api/establishments');
        $response->assertStatus(200);

        $fetched_establishments = $response->decodeResponseJson();

        $this->assertCount(10, $fetched_establishments);

        $establishments->each(function($establishment) use ($fetched_establishments) {
            $this->assertContains($establishment->id, collect($fetched_establishments)->pluck('id')->all());
        });
    }
}