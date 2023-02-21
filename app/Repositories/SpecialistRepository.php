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

use App\Models\Specialist;
use App\Models\Workspace;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class SpecialistRepository extends BaseRepository{

    public function __construct(){
        parent::__construct(Specialist::class);
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
            $specialist = $this->getByUuid($uuid);
        } catch (ModelNotFoundException $exception) {
            return false;
        }

        $specialist->update($data);
        return $specialist->fresh();
    }

    public function delete($uuid)
    {
        $specialist = $this->getByUuid($uuid);
        return $specialist->delete();
    }

    public function getSpecialistByWorkspaceId() {
        $userWorkspace = $this->getWorkspaceByUserId();
        $specialists = Specialist::where('workspace_id', $userWorkspace->workspace_id)->get();
        return $specialists;
    }
}