<?php


namespace Tests\Unit\Establishments;


use App\Establishments\Establishment;
use App\Establishments\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EstablishmentFeaturesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function features_can_be_attached_to_an_establishment()
    {
        $establishment = factory(Establishment::class)->create();
        $features = factory(Feature::class, 2)->create();

        $establishment->addFeatures($features);

        $this->assertCount(2, $establishment->fresh()->features);

        $this->assertEquals($features->pluck('id')->all(), $establishment->fresh()->features->pluck('id')->all());

    }

    /**
     *@test
     */
    public function a_list_of_features_can_be_synced_with_an_establishment()
    {
        $featureA = factory(Feature::class)->create();
        $featureB = factory(Feature::class)->create();
        $featureC = factory(Feature::class)->create();
        $featureD = factory(Feature::class)->create();

        $establishment = factory(Establishment::class)->create();
        $establishment->addFeatures($featureA);
        $this->assertTrue($establishment->fresh()->features->contains($featureA));

        $establishment->syncFeatures(collect([$featureB, $featureC, $featureD])->pluck('id')->all());

        $this->assertFalse($establishment->fresh()->features->contains($featureA));
        $this->assertTrue($establishment->fresh()->features->contains($featureB));
        $this->assertTrue($establishment->fresh()->features->contains($featureC));
        $this->assertTrue($establishment->fresh()->features->contains($featureD));
    }

    /**
     *@test
     */
    public function an_establishment_can_fetch_its_features()
    {
        $establishment = factory(Establishment::class)->create();
        $features = collect(['beer', 'wine', 'sports', 'music', 'dates'])->map(function($name) {
            return ['label' => $name, 'short_name' => $name];
        })->map(function($attributes) {
            return factory(Feature::class)->create($attributes);
        });
        $true_features = $features->filter(function($feature) {
            return ($feature->label === 'beer') || ($feature->label === 'music');
        });
        $establishment->addFeatures($true_features->pluck('id')->all());

        $expected = [
            'beer' => true,
            'wine' => false,
            'sports' => false,
            'music' => true,
            'dates' => false
        ];

        $this->assertEquals($expected, $establishment->fresh()->featureList());

        $expected = [
            []
        ];
    }
}