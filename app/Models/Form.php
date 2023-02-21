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
        'specialist_id',
        'user_id',
        'uuid',
        'title',
        'name',
        'year',
        'class',
        'bout',
        'birthdate',
        'father',
        'mother',
        'diagnostic',
        'description',
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
        'specialist',
        'workspace_id',
        'specialist_id',
        'user_id'
    ];

    protected $appends = ['author', 'medical'];

    public function workspace()
    {
        return $this->hasOne(Workspace::class);
    }

    public function specialist()
    {
        return $this->belongsTo(Specialist::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAuthorAttribute()
    {
        return $this->user?->name;
    }

    public function getMedicalAttribute()
    {
        $specialist = $this->specialist;
        return $specialist?->name.' - '.$specialist?->area.' - '.$specialist?->residence;
    }
}
