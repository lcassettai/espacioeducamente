<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
        return $this->belongsToMany(ObraSocial::class);
use App\Models\{Tratamiento,Persona,Prestador,Diagnostico,ObraSocial};

class Paciente extends Model
{
    use HasFactory;

    public function persona(){
        $this->belongsTo(Persona::class);
    }

    public function prestador(){
        $this->belongsTo(Prestador::class);
    }

    public function tratamientos(){
        $this->hasMany(Tratamiento::class);
    }

    public function diagnosticos(){
        $this->hasMany(Diagnostico::class);
    }

    public function obrasSociales()
    {
        return $this->belongsToMany(ObraSocial::class, 'obrasocial_paciente', 'obrasocial_id', 'paciente_id');
    }
}
