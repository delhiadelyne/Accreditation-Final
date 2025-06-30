<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $fillable = [
        'institution_id',
        'name',
        'description',
        'quantity',
    ];

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
