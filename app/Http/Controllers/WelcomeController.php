<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class WelcomeController extends Controller
{
    public function index()
    {
        $total_personas = Persona::count();
        $totales = [
            'totales' => [
                'personas' => $total_personas,
                'pacientes' => 3,
            ]
        ];
    
        return view('welcome', $totales);
    }
}
