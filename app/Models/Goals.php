<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Goals extends Model
{
    use HasFactory, Uuids;

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'form_id',
        'type',
        'goal',
        'period',
        'perfomance',
        'strategy',
        'resource',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'type',
        'form_id',
        'created_at',
        'updated_at'
    ];

    protected $appends = ['slug'];

    public function getSlugAttribute()
    {
        return Str::slug($this->type);
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
