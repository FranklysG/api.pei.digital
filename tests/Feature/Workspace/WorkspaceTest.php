<?php

namespace Tests\Feature;

use App\Models\UserWorkspace;
use App\Models\Workspace;
use Database\Factories\WorkspaceFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WorkspaceTest extends TestCase
{
    /**
     * @return void
     */

    /** @test */
    public function user_try_create_new_workspace_with_user()
    {
        $this->signIn();
        $data = [
            'name' => 'Workspace - Pei Digital'
        ];

        $response = $this->post(route('api.workspace.store'), $data);
        $workspace = $response->json();

        $response->assertStatus(200);
        $this->assertNotNull($workspace);
        $this->assertEquals(4, count($workspace['data']));
    }

    /** @test */
    public function user_try_delete_exist_workspace()
    {
        $this->signIn();
        $workspace = Workspace::factory()->create();
        $data = [
            'uuid' => $workspace->uuid,
        ];

        $response = $this->delete(route('api.workspace.destroy'), $data);
        $deleted = Workspace::find($workspace->id);
        $response->assertStatus(200);
        $this->assertNull($deleted);
    }

     /** @test */
     public function user_try_get_user_workspace()
     {
        // TODO: get works bt user uuid to table on user_workspace
        $user = $this->signIn();
        $workspaces = Workspace::factory(2)->create();
        foreach ($workspaces as $workspace) {
            UserWorkspace::create([
                'user_id' => $user->id,
                'workspace_id' => $workspace->id
            ]);
        }
        $response = $this->get(route('api.workspace.show'));
        $workspace = $response->json();
        $response->assertStatus(200);
        $this->assertNotNull($workspace);
     }
}
