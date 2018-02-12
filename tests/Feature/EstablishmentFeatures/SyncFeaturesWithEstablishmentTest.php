<?php


namespace Tests\Feature\EstablishmentFeatures;


use App\Establishments\Establishment;
use App\Establishments\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SyncFeaturesWithEstablishmentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function the_features_for_an_establishment_may_be_synced()
    {
        $this->disableExceptionHandling();
        $featureA = factory(Feature::class)->create();
        $featureB = factory(Feature::class)->create();
        $featureC = factory(Feature::class)->create();
        $featureD = factory(Feature::class)->create();

        $establishment = factory(Establishment::class)->create();
        $establishment->addFeatures($featureA);

        $this->assertTrue($establishment->fresh()->features->contains($featureA));

        $response = $this->asLoggedInUser()
                         ->json(
                             "POST",
                             "/admin/establishments/{$establishment->id}/features",
                             [
                                 'feature_ids' => collect([$featureB, $featureC, $featureD])->pluck('id')->all()
                             ]);
        $response->assertStatus(200);

        $this->assertFalse($establishment->fresh()->features->contains($featureA));
        $this->assertTrue($establishment->fresh()->features->contains($featureB));
        $this->assertTrue($establishment->fresh()->features->contains($featureC));
        $this->assertTrue($establishment->fresh()->features->contains($featureD));
    }

    /**
     * @test
     */
    public function the_feature_ids_are_required()
    {
        $establishment = factory(Establishment::class)->create();
        $response = $this->asLoggedInUser()
                         ->json(
                             "POST",
                             "/admin/establishments/{$establishment->id}/features",
                             ['feature_ids' => '']);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('feature_ids');
    }

    /**
     *@test
     */
    public function the_feature_ids_must_be_an_array()
    {
        $establishment = factory(Establishment::class)->create();
        $response = $this->asLoggedInUser()
                         ->json(
                             "POST",
                             "/admin/establishments/{$establishment->id}/features",
                             ['feature_ids' => 2]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('feature_ids');
    }

    /**
     *@test
     */
    public function the_feature_ids_must_all_be_integer_values()
    {
        $establishment = factory(Establishment::class)->create();
        $response = $this->asLoggedInUser()
                         ->json(
                             "POST",
                             "/admin/establishments/{$establishment->id}/features",
                             ['feature_ids' => [1,2,3,'not-an-integer']]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('feature_ids.3');
    }

    /**
     *@test
     */
    public function the_ids_must_belong_to_an_existing_feature()
    {
        $establishment = factory(Establishment::class)->create();
        $response = $this->asLoggedInUser()
                         ->json(
                             "POST",
                             "/admin/establishments/{$establishment->id}/features",
                             ['feature_ids' => [99]]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('feature_ids.0');
    }
}