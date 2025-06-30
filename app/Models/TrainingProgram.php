<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingProgram extends Model
{
    protected $fillable = [
        'institution_id',
        'name',
        'source_of_competency',
        'module_duration',
        'number_of_trainees',
        'training_duration',
        'entry_requirements',
        'description',
        'image',
    ];

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function competencies()
    {
        return $this->belongsToMany(Competency::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class); // New relationship
    }

    public function applications()
    {
        return $this->hasMany(TrainingProgramApplication::class);
    }
}
