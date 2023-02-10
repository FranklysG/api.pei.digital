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
use App\Models\Workspace;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class FormRepository extends BaseRepository{

    public function __construct(){
        parent::__construct(Form::class);
    }

    public function create($data){
        $workspace = Workspace::where('uuid', $data['workspace_uuid'])->first();
        $data = array_merge($data, [
            'user_id' => Auth::user()->id,
            'workspace_id' => $workspace->id 
        ]);
        
        $model = $this->model->create($data);
        return $model->fresh();
    }

    public function update($uuid, $data)
    {
        try {
            $form = $this->getByUuid($uuid);
        } catch (ModelNotFoundException $exception) {
            return false;
        }

        $form->update($data);
        return $form->fresh();
    }

    public function delete($uuid)
    {
        $form = $this->getByUuid($uuid);
        return $form->delete();
    }

    public function getFormByWorkspaceId() {
        $userWorkspace = $this->getWorkspaceByUserId();
        $forms = Form::where('workspace_id', $userWorkspace->workspace_id)->get();
        return $forms;
    }
}