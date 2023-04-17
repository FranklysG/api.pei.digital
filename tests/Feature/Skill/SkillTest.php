<?php

namespace Tests\Feature;

use App\Models\Skill;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SkillTest extends TestCase
{
    /**
     * @return void
     */

    /** @test */
    public function user_try_get_all_skills()
    {
        $this->signIn();

        $this->createSkills();

        $response = $this->get(route('api.skill.show'));
        $skills = $response->json();
        
        $response->assertStatus(200);
        $this->assertNotNull($skills);
        $this->assertEquals(4, count($skills));
        $this->assertEquals(13, count($skills['data']['habilidades-cognitivas']));
        $this->assertEquals(7, count($skills['data']['habilidades-metacognitivas']));
        $this->assertEquals(10, count($skills['data']['habilidades-comunicacionais']));
        $this->assertEquals(11, count($skills['data']['habilidades-socioemocionais']));
    }
}
