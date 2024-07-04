<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'division_id',
        'profile',
        'percent'
    ];

    public function divisionInfo()
    {
        return $this->belongsTo(\App\Models\ProjectDivision::class,'division_id');
    }
}
