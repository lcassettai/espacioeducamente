<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Informe,Tratamiento,Prestador};

class Prestacion extends Model
{
    use HasFactory;

    protected $table = "prestaciones";
    
    public function informes(){
        return $this->hasMany(Informe::class);
    }

    public function tratamiento(){
        return $this->belongsTo(Tratamiento::class);
    }

    public function prestador(){
        return $this->belongsTo(Prestador::class);
    }

}
