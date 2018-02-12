<?php

namespace Tests;

use App\Exceptions\Handler;
use App\User;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function disableExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, new class extends Handler {
            public function __construct() {}

            public function report(\Exception $e)
            {
            }

            public function render($request, \Exception $e) {
                throw $e;
            }
        });
    }

    protected function asLoggedInUser($attributes = [])
    {
        $attributes = array_merge(['password' => bcrypt('password')], $attributes);
        $user = factory(User::class)->create($attributes);
        return $this->actingAs($user);
    }
}
