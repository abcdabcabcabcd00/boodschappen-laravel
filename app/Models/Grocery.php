<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Grocery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'amount',
        'category_id'
    ];

    protected $casts = [
        'price' => 'float',
        'amount' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}