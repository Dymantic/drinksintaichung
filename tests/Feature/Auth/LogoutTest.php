<?php


namespace Tests\Feature\Auth;


use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function a_logged_in_user_may_logout()
    {
        $this->disableExceptionHandling();
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->post("/admin/logout");

        $response->assertRedirect("/");
        $this->assertFalse(Auth::check());
    }
}