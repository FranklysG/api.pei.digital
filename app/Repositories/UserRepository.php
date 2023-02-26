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

use App\Models\User;
use App\Models\UserWorkspace;
use App\Models\Workspace;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository
{

    public function __construct()
    {
        parent::__construct(User::class);
    }

    public function create($data)
    {
        $workspace = Workspace::where('uuid', $data['workspace_uuid'])->first();
        $data['password'] = Hash::make($data['password']);
        $model = $this->model->create($data);
        UserWorkspace::create([
            'user_id' => $model->id,
            'workspace_id' => $workspace->id
        ]);
        return $model->fresh();
    }

    public function update($uuid, $data)
    {
        try {
            $user = $this->getByUuid($uuid);
        } catch (ModelNotFoundException $exception) {
            return false;
        }

        $user->update($data);
        return $user->fresh();
    }

    public function delete($uuid)
    {
        try {
            $user = $this->getByUuid($uuid);
            UserWorkspace::where('user_id', $user->id)->delete();
            $user->delete();
        } catch (\Throwable $th) {
            return false;
        }

        return $user;
    }

    public function getUserByWorkspaceId()
    {
        $users = $this->getUsersByWorkspaceId();
        return $users;
    }
}
