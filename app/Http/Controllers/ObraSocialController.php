<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObraSocial;


class ObraSocialController extends Controller
{
    //

    public function index(){
        $obrasSociales = ObraSocial::all();

        return view('obrasSociales.index',compact('obrasSociales'));
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|max:255',
            'sigla' => 'required|max:20',
            'cuit' => 'numeric',
        ]);

        $obraSocial = new ObraSocial();

        $obraSocial->nombre = $request->nombre;
        $obraSocial->sigla = $request->sigla;
        $obraSocial->cuit = $request->cuit;

        $obraSocial->save();

        return redirect()->route('obras_sociales.index');
    }

    public function edit(){
        //TODO
    }

    public function destroy(){
        //TODO
    }
}
