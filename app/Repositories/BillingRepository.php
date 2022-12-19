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

use App\Models\Billing;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BillingRepository extends BaseRepository{

    public function __construct(){
        parent::__construct(Billing::class);
    }

    public function create($data){
        return $this->model->create($data);
    }

    public function update($uuid, $data)
    {
        try {
            $billing = $this->getByUuid($uuid);
        } catch (ModelNotFoundException $exception) {
            return false;
        }

        $billing->update($data);
        return $billing->fresh();
    }

    public function delete($uuid)
    {
        $billing = $this->getByUuid($uuid);
        return $billing->delete();
    }
}