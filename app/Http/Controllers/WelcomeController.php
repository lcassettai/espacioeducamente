<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Persona,Paciente};

class WelcomeController extends Controller
{
    public function index()
    {
        $total_pacientes = Paciente::count();
        $totales = [
            'totales' => [
                'pacientes' => $total_pacientes,                
            ]
        ];
    
        return view('welcome', $totales);
    }
}
