<?php

namespace Tests\Feature\Auth;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function an_existing_user_may_log_in()
    {
        $this->disableExceptionHandling();
        $user = factory(User::class)->create(['password' => bcrypt('password')]);

        $response = $this->post("/admin/login", [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertRedirect('/admin');
        $this->assertTrue(Auth::user()->is($user));
    }
}