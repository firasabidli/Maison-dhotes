<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maison extends Model
{
    protected $fillable = [
        'nom', 'description', 'adresse', 'ville', 'prix_par_nuit',
        'capacite', 'disponible', 'category_id', 'user_id', 'images'
    ];

    protected $casts = [
        'images' => 'array',
        'disponible' => 'boolean',
    ];

    public function categorie()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
