<?php


namespace Tests\Feature\Establishments;


use App\Establishments\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateFeatureTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_feature_may_be_updated()
    {
        $this->disableExceptionHandling();

        $feature = factory(Feature::class)->create([
            'label' => 'Old label',
            'icon'  => 'Old icon'
        ]);

        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/features/{$feature->id}", [
                             'label' => 'New label',
                             'icon'  => 'New icon'
                         ]);
        $response->assertStatus(200);

        $this->assertDatabaseHas('features', [
            'id'         => $feature->id,
            'label'      => 'New label',
            'short_name' => 'new-label',
            'icon'       => 'New icon'
        ]);
    }

    /**
     *@test
     */
    public function updating_a_feature_responds_with_the_updated_data()
    {
        $this->disableExceptionHandling();
        $feature = factory(Feature::class)->create();

        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/features/{$feature->id}", [
                             'label' => 'New label',
                             'icon'  => 'New icon'
                         ]);
        $response->assertStatus(200);

        $this->assertEquals($feature->fresh()->toJsonableArray(), $response->decodeResponseJson());
    }

    /**
     *@test
     */
    public function the_label_field_is_required()
    {
        $this->assertFieldRequired('label');
    }

    /**
     *@test
     */
    public function the_icon_field_is_required()
    {
        $this->assertFieldRequired('icon');
    }

    /**
     *@test
     */
    public function the_label_field_must_be_unique()
    {
        $featureA = factory(Feature::class)->create(['label' => 'Test feature A']);
        $featureB = factory(Feature::class)->create(['label' => 'Test feature B']);
        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/features/{$featureB->id}", $this->validFeatureAttributes([
                             'label' => 'Test feature A'
                         ]));
        $response->assertStatus(422);
        $response->assertJsonValidationErrors('label');
    }

    /**
     *@test
     */
    public function a_feature_may_be_updated_without_changing_the_label()
    {
        $this->disableExceptionHandling();
        $feature = factory(Feature::class)->create(['label' => 'Test feature']);
        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/features/{$feature->id}", [
                             'label' => 'Test feature',
                             'icon' => 'Updated icon'
                         ]);
        $response->assertStatus(200);

        $this->assertDatabaseHas("features", [
            'id' => $feature->id,
            'label' => 'Test feature',
            'icon' => 'Updated icon'
        ]);
    }

    protected function assertFieldRequired($field) {
        $feature = factory(Feature::class)->create();
        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/features/{$feature->id}", $this->validFeatureAttributes([
                             $field => ''
                         ]));
        $response->assertStatus(422);
        $response->assertJsonValidationErrors($field);
    }

    protected function validFeatureAttributes($overrides = [])
    {
        $defaults = [
            'label' => 'Test label',
            'icon' => 'Test icon'
        ];

        return array_merge($defaults, $overrides);
    }
}