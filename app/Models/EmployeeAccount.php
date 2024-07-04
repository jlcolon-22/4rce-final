<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class EmployeeAccount extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'fullname',
        'email',
        'password',
        'profile',
        'contact',
        'gender',
        'birthdate',
        'address',
        'position_id',
        'team'
    ];
    public function position()
    {
        return $this->belongsTo(EmployeePosition::class,'position_id');
    }
}
