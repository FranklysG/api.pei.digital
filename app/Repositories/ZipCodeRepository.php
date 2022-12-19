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

use App\Models\ZipCode;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ZipCodeRepository extends BaseRepository{

    public function __construct(){
        parent::__construct(ZipCode::class);
    }

    public function getZipCodesToSitemap(){
        $zipcodes = $this->model->get();

        $toSitemap = [];
        foreach ($zipcodes->toArray() as $item){
            $toSitemap[] = [
                "designation" => $item['designation'],
                "zipcode" => $item['number'].'-'.$item['extension'],
                "lastmod" => date_format(date_create($item['created_at']), 'Y-m-d')
            ];
        };

       return $toSitemap;
    }

    public function create($data){
        return $this->model->create($data);
    }

    public function update($uuid, $data)
    {
        try {
            $zipcode = $this->getByUuid($uuid);
        } catch (ModelNotFoundException $exception) {
            return false;
        }

        return $zipcode->update($data);
    }

    public function delete($uuid)
    {
        $zipcode = $this->getByUuid($uuid);
        return $zipcode->delete();
    }
}