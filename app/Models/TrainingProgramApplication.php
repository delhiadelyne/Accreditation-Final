<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingProgramApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'training_program_id',
        'status',
        'reason'
    ];

    // Define relationship to TrainingProgram
    public function trainingProgram()
    {
        return $this->belongsTo(TrainingProgram::class);
    }

    // Optionally, if you have a User model, you can relate the user that sent the application
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
