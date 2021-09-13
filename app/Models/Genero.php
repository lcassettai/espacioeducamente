<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Persona;
use App\Models\Telefono;

class Genero extends Model
{
    use HasFactory;

    public function persona(){
        //return Persona::where('genero_sigla', $this->sigla)->first();

        return $this->hasMany(Persona::class,'genero_sigla','sigla');
    }
}
