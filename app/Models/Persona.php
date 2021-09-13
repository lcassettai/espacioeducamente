<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genero;
use App\Models\Rol;

class Persona extends Model
{
    use HasFactory;

    protected $fillable = ['estado','nombre', 'apellido', 'cuit', 'documento', 'email', 'fecha_nacimiento', 'genero_sigla','telefono'];

    public function genero(){
       //return Genero::where('sigla', $this->genero_sigla)->first();

       return $this->hasOne(Genero::class, 'sigla','genero_sigla');
    }

    public function rol(){
        return $this->hasOne(Rol::class);
    }

    public function usuario()
    {
        return $this->hasOne(Usuario::class);
    }
}
