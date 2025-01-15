<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Relation;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mail',
        'email',
        'is_published',
        'time',
    ];

    protected $casts = [
        'time' => 'datetime',
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
