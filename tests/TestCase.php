<?php

namespace Tests;

use App\Models\User;
use App\Models\UserWorkspace;
use App\Models\Workspace;
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

    public function workspace() : Workspace
    {
        $user = $this->signIn();
        $workspace = Workspace::factory()->create();
        UserWorkspace::factory()->create([
            'user_id' => $user->id,
            'workspace_id' => $workspace->id
        ]);

        return $workspace;
    }
}
