<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genero;
use App\Models\Rol;
use App\Models\Diagnostico;

class Persona extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado',
        'nombre', 
        'apellido',
        'cuit',
        'documento',
        'email',
        'fecha_nacimiento', 
        'genero_sigla',
        'telefono'
    ];

    public function genero(){
       //return Genero::where('sigla', $this->genero_sigla)->first();

       return $this->hasOne(Genero::class, 'sigla','genero_sigla');
    }

    public function usuario()
    {
        return $this->hasOne(Usuario::class);
    }

    public function telefonos(){
        return $this->hasMany('telefonos');
    }
}
