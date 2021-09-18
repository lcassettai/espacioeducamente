<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Diagnostico;

class DiagnosticoController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'fecha' => 'required',
            'paciente' => 'required|numeric',
            'archivo' => 'required|mimes:pdf'
        ]);

        $archivo = $request->file('archivo')->store('public/diagnosticos');
        
        $diagnostico = new Diagnostico();

        $diagnostico->fecha = $request->fecha;
        $diagnostico->archivo_url = Storage::url($archivo);
        $diagnostico->detalle = $request->detalle;
        $diagnostico->paciente_id = $request->paciente;

        $diagnostico->save();

        return redirect()->route('pacientes.show', $diagnostico->paciente_id)->with('edit', 'ok');     
    }
}
