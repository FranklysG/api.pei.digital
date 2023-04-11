<?php
/*
 *  ______     __  __     ______     ______     __   __   ______     __
 * /\  == \   /\ \/\ \   /\___  \   /\___  \   /\ \ / /  /\  ___\   /\ \
 * \ \  __<   \ \ \_\ \  \/_/  /__  \/_/  /__  \ \ \'/   \ \  __\   \ \ \____
 *  \ \_____\  \ \_____\   /\_____\   /\_____\  \ \__|    \ \_____\  \ \_____\
 *   \/_____/   \/_____/   \/_____/   \/_____/   \/_/      \/_____/   \/_____/
 *
 * Made By: Franklys Guimaraes
 *
 * ♥ BY Buzzers: BUZZVEL.COM
 * Last Update: 2022.7.26
 */

namespace App\Repositories;

use App\Models\Skill;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class SkillRepository extends BaseRepository
{

    public function __construct()
    {
        parent::__construct(Skill::class);
    }


    public function getAllSkills()
    {
        $orderSkill = [];
        $skills = $this->getAll();

        foreach ($skills as $value) {
            $orderSkill[$value['slug']][] = [
                'uuid' => $value['uuid'],
                'title' => $value['title']
            ];
        }

        return $orderSkill;
    }
}
