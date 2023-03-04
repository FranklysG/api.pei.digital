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
        $this->assertEquals(13, count($skills['data']['Habilidades Cognitivas']));
        $this->assertEquals(7, count($skills['data']['Habilidades Metacognitivas']));
        $this->assertEquals(10, count($skills['data']['Habilidades comunicacionais']));
        $this->assertEquals(16, count($skills['data']['Habilidades Motoras/Psicomotoras']));
    }
}
