<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corso extends Model
{
    protected $fillable = [
        'nome', 'tipologia', 'durata',
    ];
    
    /**
     * Exams of the chosen course
     */
    public function exams()
    {
        return $this->hasMany('App\Esame');
    }

    protected $table = "corso_di_laurea";
}
