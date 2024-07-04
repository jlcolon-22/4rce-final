<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'feedback',
        'rating',
        'customer_id',
    ];

    public function customerInfo()
    {
        return $this->hasOne(Customer::class,'id','customer_id');
    }
}
