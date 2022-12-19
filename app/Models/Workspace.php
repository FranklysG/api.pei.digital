<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    use HasFactory, Uuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'requests',
        'integrations',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'plan_id',
        'integration_id',
        'billing_detail_id',
        'setting_id'
    ];

    public function plan() {
        return $this->hasOne(Plan::class);
    }

    public function billingDetail() {
        return $this->hasOne(BillingDetail::class);
    }

    public function integration() {
        return $this->hasOne(Integration::class);
    }

    public function setting() {
        return $this->hasOne(Setting::class);
    }

    public function users(){
        return $this->belongsToMany(User::class, 'user_workspaces');
    }
}
