<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Tratamiento,Persona,Prestador,Diagnostico,ObraSocial};

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'tiene_cud',
        'persona_id',
        'prestador_id',
    ];

    public function persona(){
        return $this->belongsTo(Persona::class);
    }

    public function prestador(){
        return $this->belongsTo(Prestador::class);
    }

    public function tratamientos(){
        return  $this->hasMany(Tratamiento::class);
    }

    public function diagnosticos(){
        return $this->hasMany(Diagnostico::class);
    }

    public function obrasSociales()
    {
        return $this->belongsToMany(ObraSocial::class, 
        'obrasocial_paciente', 
        'obrasocial_id', 
        'paciente_id')->withPivot('nro_afiliado');
    }
}
