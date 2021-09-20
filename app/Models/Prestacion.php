<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Informe,Tratamiento,Prestador,Servicio};

class Prestacion extends Model
{
    use HasFactory;

    protected $table = "prestaciones";

    protected $fillable = [
        "prestador_id",
        "tratamiento_id",
        "servicio_id",
        "estado",
        "fecha_alta",
        "observaciones",
        "sesiones_asignadas",
    ];
    
    public function informes(){
        return $this->hasMany(Informe::class);
    }

    public function tratamiento(){
        return $this->belongsTo(Tratamiento::class);
    }

    public function prestador(){
        return $this->belongsTo(Prestador::class);
    }
    
    public function servicio(){
        return $this->belongsTo(Servicio::class);
    }

    public function validarNuevaPrestacion($tratamiento){
        return $tratamiento;
    }
}
