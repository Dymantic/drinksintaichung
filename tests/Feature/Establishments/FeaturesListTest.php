<?php


namespace Tests\Feature\Establishments;


use App\Establishments\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FeaturesListTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function a_list_of_all_features_can_be_fetched()
    {
        $features = factory(Feature::class, 10)->create();

        $response = $this->json("GET", "/api/features");
        $response->assertStatus(200);

        $fetched_features = $response->decodeResponseJson();

        $this->assertCount(10, $fetched_features);

        $features->each(function($feature) use ($fetched_features) {
            $this->assertContains($feature->toJsonableArray(), $fetched_features);
        });
    }
}