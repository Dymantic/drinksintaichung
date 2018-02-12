<?php


namespace Tests\Feature\Establishments;


use App\Establishments\Establishment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateEstablishmentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function an_establishment_may_be_updated()
    {
        $this->disableExceptionHandling();
        $establishment = factory(Establishment::class)->create($this->validEstablishmentAttributes());

        $updated_data = [
            'name'          => 'Updated Establishment Name',
            'type'          => 'Updated Type',
            'description'   => 'Updated Description',
            'address'       => 'Updated Address',
            'zh_address'    => 'Updated Chinese Address',
            'opening_hours' => 'Updated opening hours',
            'happy_hour'    => 'Updated happy_hour',
            'latitude'      => 44,
            'longitude'     => 44
        ];

        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/establishments/{$establishment->id}", $updated_data);
        $response->assertStatus(200);

        $this->assertDatabaseHas('establishments', array_merge(['id' => $establishment->id], $updated_data));
    }

    /**
     * @test
     */
    public function the_update_requests_responds_with_updated_data()
    {
        $this->disableExceptionHandling();
        $establishment = factory(Establishment::class)->create();

        $response = $this->asLoggedInUser()
                         ->json(
                             "POST",
                             "/admin/establishments/{$establishment->id}",
                             $this->validEstablishmentAttributes()
                         );
        $response->assertStatus(200);

        $this->assertEquals($establishment->fresh()->toJsonableArray(), $response->decodeResponseJson());
    }

    protected function validEstablishmentAttributes($overrides = [])
    {
        $defaults = [
            'name'          => 'Test Establishment Name',
            'type'          => 'Test Type',
            'description'   => 'Test Description',
            'address'       => 'Test Address',
            'zh_address'    => 'Test Chinese Address',
            'opening_hours' => 'Test opening hours',
            'happy_hour'    => 'Test happy hour',
            'latitude'      => 66,
            'longitude'     => 88
        ];

        return array_merge($defaults, $overrides);
    }

    /**
     * @test
     */
    public function the_name_field_is_required()
    {
        $this->assertFieldRequired('name');
    }

    /**
     * @test
     */
    public function the_type_field_is_required()
    {
        $this->assertFieldRequired('type');
    }

    /**
     * @test
     */
    public function the_description_field_is_required()
    {
        $this->assertFieldRequired('description');
    }

    /**
     * @test
     */
    public function the_address_is_required()
    {
        $this->assertFieldRequired('address');
    }

    /**
     * @test
     */
    public function the_chinese_address_is_required()
    {
        $this->assertFieldRequired('zh_address');
    }

    /**
     * @test
     */
    public function the_latitude_is_required()
    {
        $this->assertFieldRequired('latitude');
    }

    /**
     * @test
     */
    public function the_longitude_is_required()
    {
        $this->assertFieldRequired('longitude');
    }

    /**
     * @test
     */
    public function the_latitude_should_be_numerical()
    {
        $establishment = factory(Establishment::class)->create();
        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/establishments/{$establishment->id}",
                             $this->validEstablishmentAttributes([
                                 'latitude' => 'not-a-number'
                             ]));
        $response->assertStatus(422);

        $response->assertJsonValidationErrors('latitude');
    }

    /**
     * @test
     */
    public function the_longitude_should_be_numerical()
    {
        $establishment = factory(Establishment::class)->create();
        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/establishments/{$establishment->id}",
                             $this->validEstablishmentAttributes([
                                 'longitude' => 'not-a-number'
                             ]));
        $response->assertStatus(422);

        $response->assertJsonValidationErrors('longitude');
    }

    /**
     * @test
     */
    public function the_latitude_cannot_be_less_than_minus_80()
    {
        $establishment = factory(Establishment::class)->create();
        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/establishments/{$establishment->id}",
                             $this->validEstablishmentAttributes([
                                 'latitude' => -81
                             ]));
        $response->assertStatus(422);

        $response->assertJsonValidationErrors('latitude');
    }

    /**
     * @test
     */
    public function the_latitude_cannot_be_greater_than_80()
    {
        $establishment = factory(Establishment::class)->create();
        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/establishments/{$establishment->id}",
                             $this->validEstablishmentAttributes([
                                 'latitude' => 81
                             ]));
        $response->assertStatus(422);

        $response->assertJsonValidationErrors('latitude');
    }

    /**
     * @test
     */
    public function the_longitude_cannot_be_less_than_minus_180()
    {
        $establishment = factory(Establishment::class)->create();
        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/establishments/{$establishment->id}",
                             $this->validEstablishmentAttributes([
                                 'longitude' => -181
                             ]));
        $response->assertStatus(422);

        $response->assertJsonValidationErrors('longitude');
    }

    /**
     * @test
     */
    public function the_longitude_cannot_be_greater_than_180()
    {
        $establishment = factory(Establishment::class)->create();
        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/establishments/{$establishment->id}",
                             $this->validEstablishmentAttributes([
                                 'longitude' => 181
                             ]));
        $response->assertStatus(422);

        $response->assertJsonValidationErrors('longitude');
    }

    protected function assertFieldRequired($field)
    {
        $establishment = factory(Establishment::class)->create();
        $response = $this->asLoggedInUser()
                         ->json(
                             "POST",
                             "/admin/establishments/{$establishment->id}",
                             $this->validEstablishmentAttributes([$field => '']));
        $response->assertStatus(422);

        $response->assertJsonValidationErrors($field);
    }
}