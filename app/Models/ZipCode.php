<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    use HasFactory, Uuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'number',
        'extension',
        'designation',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'district_id',
        'concelho_id',
        'location_id',
        'artery_id'
    ];

    public function countries(){
        return $this->hasOne(Country::class);
    }

    public function districts(){
        return $this->hasOne(District::class);
    }

    public function locations(){
        return $this->hasOne(Location::class);
    }

    public function arteries(){
        return $this->hasOne(Artery::class);
    }
}
