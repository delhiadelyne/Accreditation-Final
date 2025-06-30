<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramApplicant extends Model
{
    protected $fillable = [
        'trainee_id',
        'training_program_id',
        'institution_id',
        'application_date',
        'status',
    ];

    public function trainee()
    {
        return $this->belongsTo(Trainee::class);
    }

    public function trainingProgram()
    {
        return $this->belongsTo(TrainingProgram::class);
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
