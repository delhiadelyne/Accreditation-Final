<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'institution_id',
        'name',
        'position',
        'qualification',
        'availability',
    ];

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
