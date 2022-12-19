<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Auth;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;
    protected $connectionsToTransact = ['mysql','mysql-logs'];

    public function signIn() : User
    {
        $user = User::factory()->create();
        Auth::login($user);
        return $user;
    }
}
