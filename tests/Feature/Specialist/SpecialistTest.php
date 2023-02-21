<?php

namespace Tests\Feature;

use App\Models\Specialist;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SpecialistTest extends TestCase
{
    /**
     * @return void
     */

    /** @test */
    public function user_try_create_specialist_user()
    {
        $workspace = $this->workspace();
        $data = [
            'name' => 'Dr. Claudio Duarte',
            'area' => 'Medical - Pediatra',
            'residence' => 'Palmas - TO',
            'workspace_uuid' => $workspace->uuid
        ];

        $response = $this->post(route('api.specialist.store'), $data);
        $specialists = $response->json();

        $response->assertStatus(200);
        $this->assertEquals(6, count($specialists['data']));
        $this->assertNotNull($specialists);
    }

    /** @test */
    public function user_try_update_specialist_user()
    {
        $this->signIn();
        $workspace = $this->workspace();
        $specialist = Specialist::factory()->create([
            'workspace_id' => $workspace->id
        ]);

        $data = [
            'uuid' => $specialist->uuid,
            'name' => 'Form Updated'
        ];
        $response = $this->put(route('api.specialist.update'), $data);
        $specialists = $response->json();

        $response->assertStatus(200);
        $this->assertNotNull($specialists);
        $this->assertEquals(6, count($specialists['data']));
    }

    /** @test */
    public function user_try_get_specialist_by_user()
    {
        $this->signIn();
        $workspace = $this->workspace();
        Specialist::factory()->create([
            'workspace_id' => $workspace->id
        ]);

        $response = $this->get(route('api.specialist.show'));
        $specialists = $response->json();
        $response->assertStatus(200);
        $this->assertNotNull($specialists);
    }

    /** @test */
    public function user_try_delete_specialist_by_uuid()
    {
        $this->signIn();
        $workspace = $this->workspace();
        Specialist::factory()->create([
            'workspace_id' => $workspace->id
        ]);

        $specialist = Specialist::first();
        $data = [
            'uuid' => $specialist->uuid
        ];

        $response = $this->delete(route('api.specialist.destroy'), $data);
        $response->json();

        $response->assertStatus(200);
    }
}
