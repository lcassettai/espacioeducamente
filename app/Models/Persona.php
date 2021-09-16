<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genero;
use App\Models\Paciente;
use App\Models\Telefono;

class Persona extends Model
{
    use HasFactory;

    protected $fillable = [
        'esta_activo',
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
        return $this->hasMany(Telefono::class);
    }

    public function pacientes(){
        return $this->hasMany(Paciente::class);
    }
}
