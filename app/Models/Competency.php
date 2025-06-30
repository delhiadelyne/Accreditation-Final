<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competency extends Model
{
    protected $fillable = [
        'name',
        'description',
        'source',
    ];

    public function trainingPrograms()
    {
        return $this->belongsToMany(TrainingProgram::class);
    }
}
