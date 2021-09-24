<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informe;
use App\Models\Prestacion;
use Illuminate\Support\Facades\Storage;

class InformeController extends Controller
{
    public function create(Prestacion $prestacion){

        return view('informes.create',compact('prestacion'));
    }

    public function store(Request $request){
        $request->validate([
            'fecha' => 'required',
            'prestacion_id' => 'required|numeric',
            'archivo' => 'required|mimes:pdf,doc,docx',
            'titulo' => 'required'
        ]);

        $archivo = $request->file('archivo')->store('public/informes');

        $informe = new Informe();

        $informe->fecha = $request->fecha;
        $informe->titulo = $request->titulo;
        $informe->url_archivo = Storage::url($archivo);
        $informe->observaciones = $request->observaciones;
        $informe->prestacion_id = $request->prestacion_id;

        $informe->save();

        return redirect()->route('prestaciones.show', $request->prestacion_id)->with('edit', 'ok');   
    }

    public function edit(Informe $informe)
    {
        return view('informes.edit',compact('informe'));
    }

    public function update(Request $request,Informe $informe){
        $informe->update($request->all());

        return redirect()->route('prestaciones.show', $informe->prestacion_id)->with('edit', 'ok');
    }   
}
