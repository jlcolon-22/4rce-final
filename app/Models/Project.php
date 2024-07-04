<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'proposed_project',
        'project_name',
        'start_date',
        'deadline',
        'cost',
        'project_location',
        'divisions',
        'description',
        'assign_team',
        'customer',
        'status',
        'final_image'
    ];

    public function divisions()
    {
        return $this->hasMany(\App\Models\Division::class,'project_id','id');
    }

    public function team()
    {
        return $this->belongsTo(\App\Models\ProjectTeam::class,'assign_team','id');
    }

    public function customerInfo()
    {
        return $this->belongsTo(\App\Models\Customer::class,'customer');
    }
}
