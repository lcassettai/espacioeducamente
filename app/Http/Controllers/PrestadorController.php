<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrestador;
use Illuminate\Http\Request;
use App\Models\{Prestador,Genero,Persona};

class PrestadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestadores = Prestador::join('personas', 'prestadores.persona_id', 'personas.id')
        ->where('esta_activo', true)
        ->orderBy('apellido', 'desc')
        ->select('personas.*', 'prestadores.*')
        ->get();
       
        return view('prestadores.index',compact('prestadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generos = Genero::all();

        return view('prestadores.create',compact('generos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrestador $request)
    {
        $datos = $request->all();

        $datos['esta_activo'] = $request->has('esta_activo');

        //$persona = Persona::create($datos);
        Persona::create($datos)->prestadores()->create($datos);

        return redirect()->route('prestadores.index')->with('create', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $prestador = Prestador::find($id);

        return view('prestadores.show', compact('prestador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}