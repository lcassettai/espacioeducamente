<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genero;
use App\Models\Paciente;
use App\Models\Telefono;
use App\Models\Prestador;
use App\Models\User;

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
        'telefono',
        'imagen_perfil'
    ];

    public function genero(){
       //return Genero::where('sigla', $this->genero_sigla)->first();

       return $this->hasOne(Genero::class, 'sigla','genero_sigla');
    }

    public function telefonos(){
        return $this->hasMany(Telefono::class);
    }

    public function pacientes(){
        return $this->hasMany(Paciente::class);
    }

    public function prestadores()
    {
        return $this->hasMany(Prestador::class);
    }

    public function user(){
        return $this->hasOne(User::class);
    }
}
