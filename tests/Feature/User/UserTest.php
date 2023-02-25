<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserWorkspace;
use App\Models\Workspace;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * @return void
     */

    /** @test */
    public function user_try_create_user()
    {
        $this->signIn();
        $data = [
            'name' => 'Dr. Claudio Duarte',
            'password' => 'password',
            'email' => 'caludio.duarte@pei.com'
        ];

        $response = $this->post(route('api.user.store'), $data);
        $user = $response->json();

        $response->assertStatus(200);
        $this->assertEquals(8, count($user['data']));
        $this->assertNotNull($user);
    }

    /** @test */
    public function user_try_update_user()
    {
        $this->signIn();
        $user = User::factory()->create();
        $data = [
            'uuid' => $user->uuid,
            'name' => 'Form Updated'
        ];
        $response = $this->put(route('api.user.update'), $data);
        $user = $response->json();

        $response->assertStatus(200);
        $this->assertNotNull($user);
        $this->assertEquals(8, count($user['data']));
    }

    /** @test */
    public function user_try_get_all_user_by_workspace_id()
    {
        $workspace = $this->workspace();
        $users = User::factory(3)->create();
        foreach($users as $user) {
            UserWorkspace::factory()->create([
                'workspace_id' => $workspace->id,
                'user_id' => $user->id
            ]);
        }
        $response = $this->get(route('api.user.show'));
        $users = $response->json();
        $response->assertStatus(200);
        $this->assertNotNull($users);
        $this->assertEquals(8, count($users['data'][0]));
    }

    /** @test */
    public function user_try_delete_by_uuid()
    {
        $this->signIn();
        $user = User::factory()->create();

        $data = [
            'uuid' => $user->uuid
        ];

        $response = $this->delete(route('api.user.destroy'), $data);
        $response->json();

        $response->assertStatus(200);
    }

    /** @test */
    public function user_try_delete_user_by_uuid_with_form_exist()
    {
        $this->signIn();
        $user = User::first();

        $data = [
            'uuid' => $user->uuid
        ];

        $response = $this->delete(route('api.user.destroy'), $data);
        $response->json();
        $response->assertStatus(200);
    }
}
