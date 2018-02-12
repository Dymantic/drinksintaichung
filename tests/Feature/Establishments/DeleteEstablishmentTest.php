<?php


namespace Tests\Feature\Establishments;


use App\Establishments\Establishment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteEstablishmentTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function an_establishment_may_be_deleted()
    {
        $this->disableExceptionHandling();
        $establishment = factory(Establishment::class)->create();

        $response = $this->asLoggedInUser()->delete("/admin/establishments/{$establishment->id}");
        $response->assertRedirect("/admin/establishments");

        $this->assertDatabaseMissing("establishments", ['id' => $establishment->id]);
    }
}