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

use App\Models\Integration;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class IntegrationRepository extends BaseRepository{

    public function __construct(){
        parent::__construct(Integration::class);
    }

    public function create($data){
        $hash = [ 'token' => Crypt::encryptString(time())];
        $data = array_merge($data, $hash);
        
        $model = $this->model->create($data);
        return $model->fresh();
    }

    public function update($uuid, $data)
    {
        try {
            $integration = $this->getByUuid($uuid);
        } catch (ModelNotFoundException $exception) {
            return false;
        }

        $integration->update($data);
        return $integration->fresh();
    }

    public function delete($uuid)
    {
        $integration = $this->getByUuid($uuid);
        return $integration->delete();
    }
}