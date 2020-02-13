<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Esame extends Model
{
    protected $fillable = [
        'nome', 'docente', 'cfu', 'corso_id',
    ];
    
    /**
     * Material of the chosen exam
     */
    public function materials()
    {
        return $this->hasMany('App\Materiale');
    }
    
    protected $table = "esame";
}
