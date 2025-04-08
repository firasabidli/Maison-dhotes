<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maison extends Model
{
    protected $fillable = ['nom', 'description', 'category_id', 'images'];

    protected $casts = [
        'images' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

