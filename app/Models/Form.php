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

    protected $appends = ['author', 'medical', 'medical_uuid', 'skills', 'goals', 'specialty'];

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

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'form_skills');
    }

    public function goals()
    {
        return $this->hasMany(Goals::class);
    }

    public function specialty()
    {
        return $this->hasMany(Specialty::class);
    }

    public function getAuthorAttribute()
    {
        return $this->user?->name;
    }

    public function getMedicalAttribute()
    {
        $specialist = $this->specialist;
        return $specialist?->name . ' - ' . $specialist?->area . ' - ' . $specialist?->residence;
    }

    public function getMedicalUuidAttribute()
    {
        return $this->specialist?->uuid;
    }

    public function getSkillsAttribute()
    {
        $skills = $this->skills()->get();
        $order = [];
        foreach ($skills as $value) {
            $formSkills = FormSkills::where('form_id', $this->id)->where('skill_id', $value['id'])->first();
            $order[$value['type']][] = ['title' => $value['title'], 'helper' =>  $formSkills->helper];
        }

        return $order;
    }

    public function getGoalsAttribute()
    {
        $goals = $this->goals()->get();
        $order = [];
        foreach ($goals as $value) {
            $order[$value['type']][] = $value;
        }
        return $order;
    }

    public function getSpecialtyAttribute()
    {
        $specialty = $this->specialty()->get();
        return $specialty;
    }
}
