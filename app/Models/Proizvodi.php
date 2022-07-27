<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proizvodi extends Model
{
    use HasFactory;
    
    public function Narudzbe(){
        return $this->belongsToMany(Narudzbe::class,'narudzbe_proizvodis','narudzbe_id','proizvodi_id')->withPivot('proizvod_kolicina');
       }
}
