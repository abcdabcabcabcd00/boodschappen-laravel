<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grocery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'amount',
    ];

    protected $casts = [
        'price' => 'float',
        'amount' => 'integer',
    ];
}