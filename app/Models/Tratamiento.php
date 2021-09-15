<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Prestacion,Paciente};

class Tratamiento extends Model
{
    use HasFactory;

    public function prestaciones(){
        return $this->hasMany(Prestacion::class);
    }

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}
