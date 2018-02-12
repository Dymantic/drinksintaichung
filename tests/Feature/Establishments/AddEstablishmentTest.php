<?php


namespace Tests\Feature\Establishments;


use App\Establishments\Establishment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddEstablishmentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function an_establishment_may_be_added()
    {
        $this->disableExceptionHandling();

        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/establishments", $this->validEstablishmentAttributes());
        $response->assertStatus(200);

        $this->assertDatabaseHas('establishments', $this->validEstablishmentAttributes());
    }

    /**
     * @test
     */
    public function an_establishment_may_only_be_added_by_logged_in_user()
    {
        $response = $this->json("POST", "/admin/establishments", $this->validEstablishmentAttributes());
        $response->assertStatus(401);

        $this->assertCount(0, Establishment::all());
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
        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/establishments", $this->validEstablishmentAttributes([
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
        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/establishments", $this->validEstablishmentAttributes([
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
        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/establishments", $this->validEstablishmentAttributes([
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
        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/establishments", $this->validEstablishmentAttributes([
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
        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/establishments", $this->validEstablishmentAttributes([
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
        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/establishments", $this->validEstablishmentAttributes([
                             'longitude' => 181
                         ]));
        $response->assertStatus(422);

        $response->assertJsonValidationErrors('longitude');
    }

    /**
     *@test
     */
    public function the_opening_hours_are_not_required()
    {
        $this->disableExceptionHandling();
        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/establishments", $this->validEstablishmentAttributes([
                             'opening_hours' => ''
                         ]));
        $response->assertStatus(200);
    }

    /**
     *@test
     */
    public function the_happy_hour_is_not_required()
    {
        $this->disableExceptionHandling();
        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/establishments", $this->validEstablishmentAttributes([
                             'happy_hour' => ''
                         ]));
        $response->assertStatus(200);
    }


    protected function validEstablishmentAttributes($overrides = [])
    {
        $defaults = [
            'name'          => 'Test Establishment Name',
            'type'          => 'Test Type',
            'description'   => 'Test Description',
            'address'       => 'Test Address',
            'zh_address'    => 'Test Chinese Address',
            'opening_hours' => 'Mon - Sun, 7 - 12pm',
            'happy_hour'    => 'Fridays 5 - 7pm',
            'latitude'      => 66,
            'longitude'     => 88
        ];

        return array_merge($defaults, $overrides);
    }

    protected function assertFieldRequired($field)
    {
        $response = $this->asLoggedInUser()
                         ->json("POST", "/admin/establishments", $this->validEstablishmentAttributes([
                             $field => ''
                         ]));
        $response->assertStatus(422);

        $response->assertJsonValidationErrors($field);
    }
}