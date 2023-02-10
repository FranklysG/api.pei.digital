<?php

namespace Tests\Feature;

use App\Models\Form;
use Database\Factories\FormFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FormTest extends TestCase
{
    /**
     * @return void
     */

    /** @test */
    public function user_try_create_forms_user()
    {
        $workspace = $this->workspace();
        $data = [
            "name" => 'Plano de estudo 3° B',
            "workspace_uuid" => $workspace->uuid 
        ];

        $response = $this->post(route('api.form.store'), $data);
        $forms = $response->json();
        
        $response->assertStatus(200);
        $this->assertEquals(8, count($forms['content']['data']));
        $this->assertNotNull($forms);
    }

     /** @test */
     public function user_try_update_forms_user()
     {
        $this->signIn();
        $form = Form::factory()->create();

        $data = [
            'uuid' => $form->uuid,
            'name' => 'Form Updated'
        ];
        $response = $this->put(route('api.form.update'), $data);
        $form = $response->json();
        
        $response->assertStatus(200);
        $this->assertNotNull($form);
        $this->assertEquals(8, count($form['content']['data']));
     }

     /** @test */
     public function user_try_get_forms_by_user()
     {
        $workspace = $this->workspace();
        Form::factory(3)->create([
            'workspace_id' => $workspace->id
        ]);

        $response = $this->get(route('api.form.show'));
        $forms = $response->json();
        $response->assertStatus(200);
        $this->assertNotNull($forms);
        $this->assertEquals(3, count($forms['content']['data']));
     }

     /** @test */
     public function user_try_delete_forms_by_uuid()
     {
        $workspace = $this->workspace();
        Form::factory(3)->create([
            'workspace_id' => $workspace->id
        ]);

        $form = Form::first();
        $data = [
            'uuid' => $form->uuid
        ];

        $response = $this->delete(route('api.form.destroy'), $data);
        $response->json();
        
        $response->assertStatus(200);
     }
}
