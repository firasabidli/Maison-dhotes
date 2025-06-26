<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['nom', 'cree_par'];


    public function maisons()
    {
        return $this->hasMany(Maison::class);
    }
    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'cree_par');
    }

}

