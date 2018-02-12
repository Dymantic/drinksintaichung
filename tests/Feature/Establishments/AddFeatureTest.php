<?php


namespace Tests\Feature\Establishments;


use App\Establishments\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddFeatureTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function a_feature_may_be_added()
    {
        $this->disableExceptionHandling();

        $response = $this->asLoggedInUser()->json("POST", "/admin/features", $this->validFeatureAttributes());
        $response->assertStatus(200);

        $this->assertDatabaseHas("features", $this->validFeatureAttributes());
    }

    /**
     *@test
     */
    public function adding_a_feature_responds_with_the_stored_data()
    {
        $this->disableExceptionHandling();

        $response = $this->asLoggedInUser()->json("POST", "/admin/features", $this->validFeatureAttributes());
        $response->assertStatus(200);

        $expected = array_merge(['id' => Feature::first()->id], $this->validFeatureAttributes());
        $this->assertArraySubset($expected, $response->decodeResponseJson());
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
        $featureA = factory(Feature::class)->create(['label' => 'Test feature']);
        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/features", $this->validFeatureAttributes([
                             'label' => 'Test feature'
                         ]));
        $response->assertStatus(422);
        $response->assertJsonValidationErrors('label');
    }

    protected function assertFieldRequired($field) {
        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/features", $this->validFeatureAttributes([
                             $field => ''
                         ]));
        $response->assertStatus(422);
        $response->assertJsonValidationErrors($field);
    }

    protected function validFeatureAttributes($overrides = []) {
        $defaults = [
            'label' => 'Test feature',
            'icon' => '<svg>Test SVG</svg>'
        ];

        return array_merge($defaults, $overrides);
    }
}