<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prestacion;

class Informe extends Model
{
    use HasFactory;

    public function prestacion(){
        return $this->belongsTo(Prestacion::class);
    }
}
