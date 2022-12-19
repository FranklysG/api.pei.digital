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

use App\Models\Setting;
use App\Models\UserWorkspace;
use App\Models\Workspace;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class SettingRepository extends BaseRepository {

    public function __construct(){
        parent::__construct(Setting::class);
    }

    public function getSettingByUser(){
        $user = Auth::user();
        $userWorkspaces = UserWorkspace::where('user_id', $user->id)->first()->toArray();
        $workspaceId = $userWorkspaces['workspace_id'];
        return $this->model->where('workspace_id', $workspaceId)->first();
    }

    public function create($data){
        $model = $this->model->create($data);
        return $model->fresh();
    }

    public function update($uuid, $data)
    {
        try {
            $workspace = $this->getByUuid($uuid);
        } catch (ModelNotFoundException $exception) {
            return false;
        }

        $workspace->update($data);
        return $workspace->fresh();
    }

    public function delete($uuid)
    {
        $workspace = $this->getByUuid($uuid);
        return $workspace->delete();
    }
}