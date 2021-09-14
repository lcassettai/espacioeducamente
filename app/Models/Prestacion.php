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
        $this->hasMany(Informe::class);
    }

    public function tratamiento(){
        $this->belongsTo(Tratamiento::class);
    }

    public function prestador(){
        $this->belongsTo(Prestador::class);
    }

}
