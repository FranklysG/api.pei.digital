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

use App\Models\Plan;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PlanRepository extends BaseRepository{

    public function __construct(){
        parent::__construct(Plan::class);
    }

    public function create($data){
        return $this->model->create($data);
    }

    public function update($uuid, $data)
    {
        try {
            $plan = $this->getByUuid($uuid);
        } catch (ModelNotFoundException $exception) {
            return false;
        }

        $plan->update($data);
        return $plan->fresh();
    }

    public function delete($uuid)
    {
        $plan = $this->getByUuid($uuid);
        return $plan->delete();
    }
}