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

use App\Models\UserWorkspace;
use App\Models\Workspace;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class WorkspaceRepository extends BaseRepository
{

    public function __construct()
    {
        parent::__construct(Workspace::class);
    }

    public function getWorkspacesByUser()
    {
        $user = Auth::user();
        $userWorkspaces = UserWorkspace::where('user_id', $user->id)->get();
        $workspace_ids = [];
        foreach ($userWorkspaces as $iten) {
            $workspace_ids[] = $iten->workspace_id;
        }
        return $this->model->whereIn('id', $workspace_ids)->get();
    }

    public function create($data)
    {
        $user = Auth::user();

        $model = $this->model->create($data);
        $model->users()->attach($user->id);
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

    public function change($uuid)
    {
        try {
            $workspace = $this->getByUuid($uuid);
        } catch (ModelNotFoundException $exception) {
            return false;
        }
        $user = Auth::user();
        $userWorkspace = UserWorkspace::where('user_id', $user->id)->first();
        $userWorkspace->update([
            'workspace_id' => $workspace->id
        ]);
        return $workspace;
    }

    public function delete($uuid)
    {
        $workspace = $this->getByUuid($uuid);
        return $workspace->delete();
    }
}
