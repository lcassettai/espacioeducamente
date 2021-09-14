<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Persona;

class Telefono extends Model
{
    use HasFactory;

    public function persona(){
        $this->belongsTo(Persona::class);
    }
}
