<?php


namespace Tests\Unit\Establishments;


use App\Establishments\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FeaturesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_feature_can_be_presented_as_a_jsonable_array()
    {
        $feature = Feature::create([
            'label'      => 'TEST LABEL',
            'icon'       => 'icon-svg'
        ]);

        $expected = [
            'id'         => $feature->id,
            'label'      => 'TEST LABEL',
            'short_name' => 'test-label',
            'icon'       => 'icon-svg'
        ];

        $this->assertEquals($expected, $feature->toJsonableArray());
    }

    /**
     *@test
     */
    public function the_short_name_is_automatically_set_based_on_the_label()
    {
        $feature = Feature::create(['label' => 'Test feature', 'icon' => 'Test icon']);

        $this->assertEquals('test-feature', $feature->short_name);
    }
}