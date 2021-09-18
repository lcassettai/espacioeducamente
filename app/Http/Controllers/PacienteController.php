<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{Persona,Paciente,Genero,Diagnostico};
use App\Http\Requests\StorePaciente;

class PacienteController extends Controller
{
    public function index(){
        $pacientes = Paciente::join('personas', 'pacientes.persona_id','personas.id')
        ->where('esta_activo',true)
        ->orderBy('apellido','desc')
        ->select('personas.*','pacientes.*')
        ->get();
       
        return view('pacientes.index',compact('pacientes'));
    }

    public function create(){
       $generos = Genero::all();

       return view('pacientes.create')->with(compact('generos'));
    }

    public function edit(Paciente $paciente){
        $generos = Genero::all();

        return view('pacientes.edit')->with(compact('paciente'))->with(compact('generos'));
    }

    public function store(StorePaciente $request){
        $datos = $request->all();
        
        $datos['esta_activo'] = $request->has('esta_activo');
        $datos['tiene_cud'] = $request->has('tiene_cud');
        $datos['prestador_id'] = 1; //harcoded TODO prestador logueado

        //$persona = Persona::create($datos);
        Persona::create($datos)->pacientes()->create($datos);
        
        return redirect()->route('pacientes.index')->with('create','ok');
    }

    public function update(Request $request, Paciente $paciente)
    {
        $datos = $request->all();

        $datos['esta_activo'] = $request->has('esta_activo');

        $paciente->update([
            'tiene_cud' => $request->has('tiene_cud')
        ]);

        $paciente->persona->update($datos);
        
        return redirect()->route('pacientes.show', $paciente->id)->with('edit','ok');
    }

    public function show(Paciente $paciente){

        return view('pacientes.show',compact('paciente'));
    }
}
