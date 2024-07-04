<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectInventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'price',
        'date_purchase',
        'unit',
        'quantity',
        'receipt',
        'project_id'
    ];
}
