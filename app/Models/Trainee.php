<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    protected $fillable = [
        'user_id',
        'date_of_birth',
        'phone',
        'address',
        'education_level',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function programApplicants()
    {
        return $this->hasMany(ProgramApplicant::class);
    }
}
