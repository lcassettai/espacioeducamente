<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Prestacion,Persona};

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
}
