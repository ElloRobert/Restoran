<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Narudzbe extends Model
{
    use HasFactory;


    public function Proizvodi(){
     return $this->belongsToMany(Proizvodi::class,'narudzbe_proizvodis','narudzbe_id','proizvodi_id')->withPivot('proizvod_kolicina');
    }
}
