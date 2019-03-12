<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Sign in a user.
     *
     * @param null|\App\User $user
     *
     * @return void
     */
    public function signIn(User $user = null): void
    {
        $this->actingAs($user ?: \factory('App\User')->create());
    }
}
