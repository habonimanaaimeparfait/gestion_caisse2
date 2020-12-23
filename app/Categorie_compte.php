<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie_compte extends Model
{
    public function comptes()
    {
        return $this->hasMany('App\Compte');
    } 
}
