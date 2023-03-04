<?php

namespace App\Http\Controllers\Skill;

use App\Models\Skill;
use App\Http\Controllers\Controller;
use App\Repositories\SkillRepository;

class SkillController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @param  \App\Repositories\SkillRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill, SkillRepository $repository)
    {
        $skills = $repository->getAllSkills();

        if($skills){
            return $this->apiResponse->successResponse('Lista de skills :)', $skills);
        }else {
            return $this->apiResponse->errorResponse('Wrong error', []);
        }
    }

}
