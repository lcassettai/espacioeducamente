<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Tratamiento,Paciente,Prestador};

class WelcomeController extends Controller
{
    public function index()
    {
        $total_pacientes = Paciente::count();
        $total_tratamientos = Tratamiento::count();
        $total_prestadores = Prestador::count();
        $totales = [
            'totales' => [
                'pacientes' => $total_pacientes,
                'tratamientos' => $total_tratamientos,
                'prestadores' => $total_prestadores,                
            ]
        ];
    
        return view('welcome', $totales);
    }
}
