<?php
/**
 * Company: Buzzvel (https://buzzvel.com)
 */

namespace App\Traits;

use Illuminate\Support\Str;

trait Uuids
{

    protected static function bootUuids()
    {
        static::creating(function ($model) {
                $model->uuid = Str::uuid()->toString();
        });
    }



}
