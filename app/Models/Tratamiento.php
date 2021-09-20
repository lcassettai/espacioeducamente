<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Prestacion,Paciente,Prestador};

class Tratamiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'prestador_id',
        'paciente_id',
        'fecha_inicio',
        'esta_activo'
    ];

    public function prestaciones(){
        return $this->hasMany(Prestacion::class);
    }

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }

    public function prestador()
    {
        return $this->belongsTo(Prestador::class);
    }
}
