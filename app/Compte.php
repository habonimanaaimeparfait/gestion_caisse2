<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    public function comptes()
    {
        return $this->belongsTo('App\Compte');
    } 
}
