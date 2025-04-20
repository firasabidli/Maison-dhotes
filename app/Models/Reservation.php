<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'maison_id',
        'client_id',
        'date_debut',
        'date_fin',
        'nombre_personnes',
        'statut',
        'is_paid',
    ];

    protected $casts = [
        'is_paid' => 'boolean',
    ];
    
    public function maison()
    {
        return $this->belongsTo(Maison::class);
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

}
