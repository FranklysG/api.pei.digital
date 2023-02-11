<?php

namespace Tests\Feature;

use App\Models\Setting;
use App\Models\UserWorkspace;
use App\Models\Workspace;
use Database\Factories\SettingFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SettingTest extends TestCase
{
    /**
     * @return void
     */

    /** @test */
    public function user_try_create_settings_user()
    {
        $this->signIn();
        $data = [
            'first_name' => 'Claudio',
            'last_name' => 'Dantas',
            'contact_movel' => true,
            'contact_email' => false
        ];

        $response = $this->post(route('api.setting.store'), $data);
        $settings = $response->json();

        $response->assertStatus(200);
        $this->assertNotNull($settings);
        $this->assertEquals(7, count($settings['data']));
    }

    /** @test */
    public function user_try_update_settings_user()
    {
        $user = $this->signIn();
        $workspace = Workspace::factory()->create();
        UserWorkspace::create([
            'user_id' => $user->id,
            'workspace_id' => $workspace->id
        ]);
        $settings = Setting::factory()->create([
            'user_id' => $user->id,
        ]);
        $data = [
            'uuid' => $settings->uuid,
            'first_name' => 'John',
            'last_name' => 'Doe'
        ];
        $response = $this->put(route('api.setting.update'), $data);
        $settings = $response->json();

        $response->assertStatus(200);
        $this->assertNotNull($settings);
        $this->assertEquals(7, count($settings['data']));
    }

    /** @test */
    public function user_try_get_settings_by_user()
    {
        $user = $this->signIn();
        $workspace = Workspace::factory()->create();
        UserWorkspace::create([
            'user_id' => $user->id,
            'workspace_id' => $workspace->id
        ]);
        Setting::factory()->create([
            'user_id' => $user->id,
        ]);
        $response = $this->get(route('api.setting.show'));
        $settings = $response->json();
        $response->assertStatus(200);
        $this->assertNotNull($settings);
        $this->assertEquals(7, count($settings['data']));
    }
}
