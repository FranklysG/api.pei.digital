<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory, Uuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'workspace_id',
        'user_id',
        'uuid',
        'name',
        'type',
        'status',
        'date'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'user',
        'workspace_id',
        'user_id'
    ];

    protected $appends = ['author'];

    public function workspace() {
        return $this->hasOne(Workspace::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getAuthorAttribute()
    {
        return $this->user?->name;
    }
}
