<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'products_id',
        'text',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Products::class); // Связь с моделью Products
    }
}
