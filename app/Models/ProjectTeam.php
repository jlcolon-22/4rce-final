<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTeam extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_name',
        'status',
        'members',
        'foreman'
    ];

    public function foremanInfo()
    {
        return $this->belongsTo(EmployeeAccount::class,'foreman');
    }
}
