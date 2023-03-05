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

use App\Models\Specialty;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class SpecialtyRepository extends BaseRepository{

    public function __construct(){
        parent::__construct(Specialty::class);
    }

    public function create($data){
        $model = $this->model->create($data);
        return $model->fresh();
    }

    public function update($uuid, $data)
    {
        try {
            $specialty = $this->getByUuid($uuid);
        } catch (ModelNotFoundException $exception) {
            return false;
        }

        $specialty->update($data);
        return $specialty->fresh();
    }

    public function delete($uuid)
    {
        $specialty = $this->getByUuid($uuid);
        return $specialty->delete();
    }
}