<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestacion;
use App\Models\Tratamiento;
use App\Models\Informe;
use App\Http\Requests\StorePrestacion;

class PrestacionController extends Controller
{
    public function list(Tratamiento $tratamiento)
    {
        $prestaciones = $tratamiento->prestaciones;

        return view('prestaciones.list',compact('prestaciones'))->with(compact('tratamiento'));
    }

    public function store(StorePrestacion $request){

        $prestaciones_activas =  Prestacion::select('*')
            ->where('esta_activo', true)
            ->where('servicio_id', $request->servicio_id)
            ->where('prestador_id', $request->prestador_id)
            ->where('tratamiento_id', $request->tratamiento_id)
            ->first();

        if(!empty($prestaciones_activas)){
            $error = ['prestaciones_activas' => 'Error'];
            return redirect()->route('tratamientos.show', $request->tratamiento_id)->withErrors($error)->withInput();
        }

        Prestacion::create($request->all());

        return redirect()->route('tratamientos.show',$request->tratamiento_id)->with('prestacion','ok');
    }

    public function show($id){
        $prestacion = Prestacion::find($id);
        
        $informes = Informe::all()->where('prestacion_id',$id);

        /*
       $prestacion =   Prestacion::select()
                         ->join('tratamientos','tratamientos.id','tratamiento_id')
                         ->join('pacientes', 'pacientes.id', 'paciente_id')
                         ->join('personas', 'personas.id', 'persona_id')
                         ->where('prestaciones.id',$id)->first(); 
        */

        return view('prestaciones.show',compact('prestacion'))->with(compact('informes'));
    }
}
