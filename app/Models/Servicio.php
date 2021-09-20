<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prestacion;

class Servicio extends Model
{
    use HasFactory;

    public function prestaciones(){
        return $this->hasMany(Prestacion::class);
    }
}
