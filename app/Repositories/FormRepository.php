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

use App\Models\Form;
use App\Models\FormSkills;
use App\Models\Goals;
use App\Models\Skill;
use App\Models\Specialist;
use App\Models\Specialty;
use App\Models\Workspace;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class FormRepository extends BaseRepository
{

    public function __construct()
    {
        parent::__construct(Form::class);
    }

    public function create($data)
    {
        $workspace = Workspace::where('uuid', $data['workspace_uuid'])->first();
        $specialist = Specialist::where('uuid', $data['specialist_uuid'])->first();

        $data = array_merge($data, [
            'user_id' => Auth::user()->id,
            'workspace_id' => $workspace->id,
            'specialist_id' => $specialist->id
        ]);

        $model = $this->model->create($data);

        if (!empty($data['skills'])) {

            $skill_ids = [];
            foreach ($data['skills'] as $value) {
                $skill_ids[] = $value['uuid'];
            }

            $skills = Skill::whereIn('uuid', $skill_ids)->get('id');
            $model->skills()->attach($skills);

            foreach ($data['skills'] as $value) {
                $skillId = Skill::where('uuid', $value['uuid'])->first()->id;
                FormSkills::where('form_id', $model->id)->where('skill_id', $skillId)->update(['helper' => $value['helper']]);
            }
        }

        if (!empty($data['specialtys'])) {
            $specialtys = $data['specialtys'];

            foreach ($specialtys as $value) {
                Specialty::create(array_merge($value, [
                    'form_id' => $model->id
                ]));
            }
        }

        if (!empty($data['goals'])) {
            $goals = $data['goals'];

            foreach ($goals as $value) {
                Goals::create(array_merge($value, [
                    'form_id' => $model->id
                ]));
            }
        }

        return $model->fresh();
    }

    public function update($uuid, $data)
    {
        try {
            $model = $this->getByUuid($uuid);
        } catch (ModelNotFoundException $exception) {
            return false;
        }

        if (!empty($data['skills'])) {

            FormSkills::where('form_id', $model->id)->delete();
            $skill_ids = [];
            foreach ($data['skills'] as $value) {
                $skill_ids[] = $value['uuid'];
            }

            $skills = Skill::whereIn('uuid', $skill_ids)->get('id');
            $model->skills()->attach($skills);

            foreach ($data['skills'] as $value) {
                $skillId = Skill::where('uuid', $value['uuid'])->first()->id;
                FormSkills::where('form_id', $model->id)->where('skill_id', $skillId)->update(['helper' => $value['helper']]);
            }
        }

        if (!empty($data['specialtys'])) {
            Specialty::where('form_id', $model->id)->delete();
            $specialtys = array_shift($data['specialtys']);

            foreach ($specialtys as $value) {
                Specialty::create(array_merge($value, [
                    'form_id' => $model->id
                ]));
            }
        }


        if (!empty($data['goals'])) {
            Goals::where('form_id', $model->id)->delete();
            $goals = array_shift($data['goals']);

            foreach ($goals as $value) {
                Goals::create(array_merge($value, [
                    'form_id' => $model->id
                ]));
            }
        }

        $model->update($data);
        return $model->fresh();
    }

    public function delete($uuid)
    {
        $model = $this->getByUuid($uuid);
        FormSkills::where('form_id', $model->id)->delete();
        Goals::where('form_id', $model->id)->delete();
        Specialty::where('form_id', $model->id)->delete();
        return $model->delete();
    }

    public function getFormByWorkspaceId()
    {
        $userWorkspace = $this->getWorkspaceByUserId();
        $forms = Form::where('workspace_id', $userWorkspace->workspace_id)->get();
        return $forms;
    }
}
