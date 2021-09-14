<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Prestacion,Paciente};

class Tratamiento extends Model
{
    use HasFactory;

    public function prestaciones(){
        $this->hasMany(Prestacion::class);
    }

    public function paciente(){
        $this->belongsTo(Paciente::class);
    }
}
