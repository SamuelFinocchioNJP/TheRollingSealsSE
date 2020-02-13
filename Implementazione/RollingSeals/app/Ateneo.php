<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ateneo extends Model
{
    protected $fillable = [
        'nome', 'citta', 'indirizzo',
    ];

    protected $table = "ateneo";
}
