<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prestacion;

class Sesion extends Model
{
    use HasFactory;

    protected $table = "sesiones";

    protected $fillable = [
        'fecha','observaciones','prestacion_id','evaluacion'
    ];

    public function prestacion(){
        return $this->belongsTo(Prestacion::class);
    }
}
