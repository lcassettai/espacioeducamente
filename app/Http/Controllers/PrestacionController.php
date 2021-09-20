<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestacion;
use App\Http\Requests\StorePrestacion;

class PrestacionController extends Controller
{
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
}
