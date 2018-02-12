<?php


namespace Tests\Feature\Establishments;


use App\Establishments\Feature;
use App\Establishments\SuggestedEstablishment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteSuggestedEstablishmentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function an_existing_suggested_establishment_may_be_deleted()
    {
        $this->disableExceptionHandling();
        $suggestion = factory(SuggestedEstablishment::class)->create();

        $response = $this->asLoggedInUser()->delete("/admin/suggested-establishments/{$suggestion->id}");
        $response->assertRedirect("/admin/suggested-establishments");

        $this->assertDatabaseMissing("suggested_establishments", ['id' => $suggestion->id]);
    }

    /**
     * @test
     */
    public function deleting_a_suggested_establishment_will_also_delete_its_records_in_the_pivot_table()
    {
        $this->disableExceptionHandling();
        $features = factory(Feature::class, 2)->create();
        $suggestion = factory(SuggestedEstablishment::class)->create();
        $suggestion->addFeatures($features->pluck('id')->all());

        $response = $this->asLoggedInUser()->delete("/admin/suggested-establishments/{$suggestion->id}");
        $response->assertRedirect("/admin/suggested-establishments");

        $this->assertDatabaseMissing("suggested_establishments", ['id' => $suggestion->id]);

        $this->assertDatabaseMissing("feature_suggested_establishment", [
            'suggested_establishment_id' => $suggestion->id
        ]);
    }

    /**
     *@test
     */
    public function a_suggested_establishment_can_only_be_deleted_by_a_registered_user()
    {
        $suggestion = factory(SuggestedEstablishment::class)->create();

        $response = $this->delete("/admin/suggested-establishments/{$suggestion->id}");
        $response->assertRedirect('/admin/login');

        $this->assertDatabaseHas("suggested_establishments", ['id' => $suggestion->id]);
    }
}