<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiale extends Model
{
    protected $fillable = [
        'nome', 'formato', 'n_pagine', 'lingua', 'contenuto', 'esame_id', 'user_id'
    ];
    
    protected $table = "materiale";
}
