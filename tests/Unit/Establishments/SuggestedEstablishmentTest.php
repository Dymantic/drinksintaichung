<?php


namespace Tests\Unit\Establishments;


use App\Establishments\Feature;
use App\Establishments\SuggestedEstablishment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SuggestedEstablishmentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function features_may_be_added_to_a_suggested_establishment_by_passing_array_of_feature_ids()
    {
        $features = factory(Feature::class, 3)->create();
        $feature_ids = $features->pluck('id')->all();
        $suggestion = factory(SuggestedEstablishment::class)->create();

        $suggestion->addFeatures($feature_ids);

        $this->assertCount(3, $suggestion->features);
        $features->each(function ($feature) use ($suggestion) {
            $this->assertTrue($suggestion->features->contains($feature));
        });
    }

    /**
     * @test
     */
    public function passing_an_empty_array_to_add_features_method_behaves_as_expected()
    {
        $features = factory(Feature::class, 2)->create();
        $suggestion = factory(SuggestedEstablishment::class)->create();
        $suggestion->addFeatures($features->pluck('id')->all());

        $suggestion->fresh()->addFeatures([]);
        $suggestion = $suggestion->fresh();

        $this->assertCount(2, $suggestion->features);
        $features->each(function ($feature) use ($suggestion) {
            $this->assertTrue($suggestion->features->contains($feature));
        });
    }

    /**
     * @test
     */
    public function a_suggested_establishment_may_be_presented_as_a_jsonable_array()
    {
        $suggestion = factory(SuggestedEstablishment::class)->create([
            'name'          => 'Test place',
            'address'       => 'Test Address',
            'opening_hours' => 'Test opening hours',
            'happy_hour'    => 'Test happy hour',
            'description'   => 'Test description',
            'email'         => 'test@test.test'
        ]);

        $expected = [
            'id'            => $suggestion->id,
            'name'          => 'Test place',
            'address'       => 'Test Address',
            'opening_hours' => 'Test opening hours',
            'happy_hour'    => 'Test happy hour',
            'description'   => 'Test description',
            'email'         => 'test@test.test',
            'requested_on' => $suggestion->created_at->toFormattedDateString()
        ];

        $this->assertEquals($expected, $suggestion->toJsonableArray());
    }

    /**
     *@test
     */
    public function the_suggested_establishments_features_will_be_included_in_the_jsonable_array_if_loaded()
    {
        $featureA = factory(Feature::class)->create(['label' => 'Feature A', 'icon' => 'icon A']);
        $featureB = factory(Feature::class)->create(['label' => 'Feature B', 'icon' => 'icon B']);

        $suggestion = factory(SuggestedEstablishment::class)->create();
        $suggestion->addFeatures([$featureA->id, $featureB->id]);

        $suggestion = SuggestedEstablishment::with('features')->find($suggestion->id);


        $expected = [
            'features' => [
                [
                    'id' => $featureA->id,
                    'label' => 'Feature A',
                    'short_name' => 'feature-a',
                    'icon' => 'icon A'
                ],
                [
                    'id' => $featureB->id,
                    'label' => 'Feature B',
                    'short_name' => 'feature-b',
                    'icon' => 'icon B'
                ]
            ]
        ];

        $this->assertArraySubset($expected, $suggestion->toJsonableArray());
    }
}