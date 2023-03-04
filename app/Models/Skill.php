<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Skill extends Model
{
    use HasFactory, Uuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'type',
        'title',
        'slug'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'pivot'
    ];

    protected $appends = ['slug'];

    public function forms()
    {
        return $this->belongsToMany(Form::class, 'form_skills');
    }

    public function getSlugAttribute()
    {
        return Str::slug($this->type);
    }
}
