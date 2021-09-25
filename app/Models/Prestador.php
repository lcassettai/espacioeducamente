<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Prestacion,Persona,Tratamiento};
use Illuminate\Support\Facades\Auth;

class Prestador extends Model
{
    use HasFactory;

    protected $fillable = [
        'persona_id',
    ];

    protected $table = "prestadores";

    public function persona(){
        return $this->belongsTo(Persona::class);
    }

    public function prestaciones(){
        return $this->hasMany(Prestacion::class);
    }

    public function tratamientos(){
        return $this->hasMany(Tratamiento::class);
    }

    //Verifica si la persona logueada es la misma que creo algun elemento
    public static function soyCreador($prestadorId){
        if(empty(Auth::user()->persona->prestadores[0])){
            return false;
        }

        $prestador_logueado = Auth::user()->persona->prestadores[0]->id;

        if($prestadorId == $prestador_logueado){
            return true;
        }

        return false;
    }
}
