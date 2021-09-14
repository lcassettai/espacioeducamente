<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Prestacion,Persona};

class Prestador extends Model
{
    use HasFactory;

    protected $table = "prestadores";

    public function persona(){
        $this->belongsTo(Persona::class);
    }

    public function prestaciones(){
        $this->hasMany(Prestacion::class);
    }
}
