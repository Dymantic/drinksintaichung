<?php


namespace Tests\Feature\Establishments;


use App\Establishments\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteFeatureTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function a_feature_may_be_deleted()
    {
        $this->disableExceptionHandling();
        $feature = factory(Feature::class)->create();

        $response = $this->asLoggedInUser()->json("DELETE", "/admin/features/{$feature->id}");
        $response->assertStatus(200);

        $this->assertDatabaseMissing("features", ['id' => $feature->id]);
    }
}