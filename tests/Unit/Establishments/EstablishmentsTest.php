<?php

namespace Tests\Unit\Establsihments;

use App\Establishments\Establishment;
use App\Establishments\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EstablishmentsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function an_establishment_can_be_presented_as_a_jsonable_array()
    {
        $establishment = factory(Establishment::class)->create([
            'name'          => 'TEST NAME',
            'type'          => 'TEST TYPE',
            'description'   => 'TEST DESCRIPTION',
            'address'       => 'TEST ADDRESS',
            'zh_address'    => 'TEST ZH ADDRESS',
            'opening_hours' => 'TEST OPENING HOURS',
            'happy_hour'    => 'TEST HAPPY HOUR',
            'latitude'      => 123.45,
            'longitude'     => 88.88
        ]);
        $featureA = factory(Feature::class)->create();
        $featureB = factory(Feature::class)->create();
        $establishment->addFeatures($featureB);

        $expected = [
            'id'           => $establishment->id,
            'name'         => 'TEST NAME',
            'type'         => 'TEST TYPE',
            'description'  => 'TEST DESCRIPTION',
            'address'      => 'TEST ADDRESS',
            'zh_address'   => 'TEST ZH ADDRESS',
            'opening_hours' => 'TEST OPENING HOURS',
            'happy_hour'    => 'TEST HAPPY HOUR',
            'location'     => ['latitude' => 123.45, 'longitude' => 88.88],
            'published'    => false,
            'feature_list' => [
                $featureA->short_name => false,
                $featureB->short_name => true
            ],
            'features'     => [
                [
                    'id'    => $featureB->id,
                    'label' => $featureB->label,
                    'icon'  => $featureB->icon
                ]
            ]
        ];

        $this->assertEquals($expected, $establishment->toJsonableArray());
    }


}