<?php


namespace Tests\Feature\Establishments;


use App\Establishments\Feature;
use App\Establishments\SuggestedEstablishment;
use Dymantic\Secretary\Facades\Secretary;
use Dymantic\Secretary\MessageReceived;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class AddSuggestedEstablishmentTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function a_place_may_be_suggested_to_add_as_an_establishment()
    {
        $this->disableExceptionHandling();

        $features = factory(Feature::class, 3)->create();

        $response = $this->json("POST", '/suggested-establishments', $this->validSuggestionAttributes([
            'features' => $features->pluck('id')->all()
        ]));
        $response->assertStatus(200);

        $this->assertDatabaseHas("suggested_establishments", [
            'name' => 'Suggested Place',
            'address' => 'Test Address Suggestion',
            'opening_hours' => 'Test opening hours',
            'happy_hour' => 'Test happy hour',
            'description' => 'Test short description',
            'email' => 'test@test.test'
        ]);

        $this->assertCount(1, SuggestedEstablishment::all());
        $suggestion = SuggestedEstablishment::first();

        $features->each(function($feature) use ($suggestion) {
           $this->assertDatabaseHas("feature_suggested_establishment", [
               'suggested_establishment_id' => $suggestion->id,
               'feature_id' => $feature->id
           ]);
        });
    }

    /**
     *@test
     */
    public function a_notification_is_dispatched_when_a_suggestion_is_submitted()
    {
        Notification::fake();

        $this->disableExceptionHandling();

        $features = factory(Feature::class, 3)->create();

        $response = $this->json("POST", '/suggested-establishments', $this->validSuggestionAttributes([
            'features' => $features->pluck('id')->all()
        ]));
        $response->assertStatus(200);

        $secretary = app()->make(\Dymantic\Secretary\Secretary::class);

        Notification::assertSentTo($secretary, MessageReceived::class, function($notification, $channels) {
            return in_array('mail', $channels);
        });
    }

    /**
     *@test
     */
    public function the_name_field_is_required()
    {
        $this->assertFieldIsRequired('name');
    }

    /**
     *@test
     */
    public function the_address_field_is_required()
    {
        $this->assertFieldIsRequired('address');
    }

    /**
     *@test
     */
    public function the_description_is_required()
    {
        $this->assertFieldIsRequired('description');
    }

    /**
     *@test
     */
    public function the_opening_hours_are_not_required()
    {
        $response = $this->json("POST", '/suggested-establishments', $this->validSuggestionAttributes([
            'opening_hours' => ''
        ]));
        $response->assertStatus(200);
    }

    /**
     *@test
     */
    public function the_happy_hour_is_not_required()
    {
        $response = $this->json("POST", '/suggested-establishments', $this->validSuggestionAttributes([
            'happy_hour' => ''
        ]));
        $response->assertStatus(200);
    }

    /**
     *@test
     */
    public function the_featured_array_is_required()
    {
        $this->assertFieldIsRequired('features');
    }

    /**
     *@test
     */
    public function the_features_must_be_an_array()
    {
        $response = $this->json("POST", '/suggested-establishments', $this->validSuggestionAttributes([
            'features' => 'not-an-array'
        ]));
        $response->assertStatus(422);

        $response->assertJsonValidationErrors('features');
    }

    /**
     *@test
     */
    public function each_entry_of_the_features_should_be_an_integer()
    {
        $response = $this->json("POST", '/suggested-establishments', $this->validSuggestionAttributes([
            'features' => ['not-an-integer']
        ]));
        $response->assertStatus(422);

        $response->assertJsonValidationErrors('features.0');
    }

    /**
     *@test
     */
    public function each_entry_of_the_features_should_be_an_existing_id_of_a_feature()
    {
        $response = $this->json("POST", '/suggested-establishments', $this->validSuggestionAttributes([
            'features' => [99]
        ]));
        $response->assertStatus(422);

        $response->assertJsonValidationErrors('features.0');
    }

    protected function assertFieldIsRequired($field)
    {
        $response = $this->json("POST", '/suggested-establishments', $this->validSuggestionAttributes([
            $field => ''
        ]));
        $response->assertStatus(422);

        $response->assertJsonValidationErrors($field);
    }

    protected function validSuggestionAttributes($overrides = [])
    {
        $features = factory(Feature::class, 2)->create();
        $defaults = [
            'name' => 'Suggested Place',
            'address' => 'Test Address Suggestion',
            'opening_hours' => 'Test opening hours',
            'happy_hour' => 'Test happy hour',
            'description' => 'Test short description',
            'email' => 'test@test.test',
            'features' => $features->pluck('id')->all()
        ];

        return array_merge($defaults, $overrides);
    }
}