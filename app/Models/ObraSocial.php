<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;

class ObraSocial extends Model
{
    use HasFactory;

    protected $table = "obras_sociales";

    public function pacientes(){
        return $this->belongsToMany(Paciente::class, 'obrasocial_paciente','paciente_id', 'obrasocial_id');
    }
}
