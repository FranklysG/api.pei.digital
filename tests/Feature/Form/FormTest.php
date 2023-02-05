<?php

namespace Tests\Feature;

use App\Models\Form;
use App\Models\UserWorkspace;
use App\Models\Workspace;
use Database\Factories\FormFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FormTest extends TestCase
{
    /**
     * @return void
     */

    /** @test */
    public function user_try_create_Forms_user()
    {
        $this->signIn();
        $data = [];

        $response = $this->post(route('api.form.store'), $data);
        $forms = $response->json();

        $response->assertStatus(200);
        $this->assertNotNull($forms);
    }

     /** @test */
    //  public function user_try_update_Forms_user()
    //  {
    //     $this->signIn();
    //     $data = [];
    //     $response = $this->put(route('api.form.update'), $data);
    //     $forms = $response->json();
        
    //     $response->assertStatus(200);
    //     $this->assertNotNull($forms);
    //     $this->assertEquals(8, count($forms['content']['data']));
    //  }

     /** @test */
    //  public function user_try_get_Forms_by_user()
    //  {
    //     $this->signIn();
    //     $response = $this->get(route('api.form.show'));
    //     $forms = $response->json();
        
    //     $response->assertStatus(200);
    //     $this->assertNotNull($forms);
    //     $this->assertEquals(8, count($forms['content']['data']));
    //  }
}
