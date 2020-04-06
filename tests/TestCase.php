<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function createUser(): User
    {
        return factory(User::class)->create();
    }

    public function createAndBeUser(): User
    {
        $user = $this->createUser();
        $this->be($user);
        return $user;
    }
}
