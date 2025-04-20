<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    protected $fillable = ['maison_id', 'client_id', 'note', 'commentaire'];

    public function maison() {
        return $this->belongsTo(Maison::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

}
