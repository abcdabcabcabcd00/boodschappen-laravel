<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "name"
    ];

    protected $casts = [
        "id" => 'integer',
        "name" => 'string'
    ];

    public function groceries(): HasMany
    {
        return $this->hasMany(Grocery::class);
    }
}