<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Persona;
use App\Models\Genero;
use App\Http\Requests\StorePersona;

class PacienteController extends Controller
{
    public function index(){
        $personas = Persona::all();
        
        return view('pacientes.index',compact('personas'));
    }

    public function edit(Persona $persona){
        $generos = Genero::all();

        return view('pacientes.edit')->with(compact('persona'))->with(compact('generos'));
    }

    public function create()
    {   
        $generos = Genero::all();

        return view('pacientes.create')->with(compact('generos'));
    }

    public function store(StorePersona $request){
        $datos = $request->all();
        $datos['estado'] = $request->has('estado');

        $persona = Persona::create($datos);

        return redirect()->route('pacientes.index', $persona->id);
    }

    public function update(Request $request, Persona $persona)
    {
        $datos = $request->all();
        $datos['estado'] = $request->has('estado');

        $persona->update($datos);

        return redirect()->route('pacientes.index');
    }
}
