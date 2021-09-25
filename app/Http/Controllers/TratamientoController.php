<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTratamiento;
use Illuminate\Http\Request;
use App\Models\Prestador;
use App\Models\Paciente;
use App\Models\Prestacion;
use App\Models\Tratamiento;
use App\Models\Servicio;

class TratamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tratamientos =  Tratamiento::all();

        foreach ($tratamientos as $index => $tratamiento) {
            $tratamiento['soyCreador'] = Prestador::soyCreador($tratamiento->prestador_id);
        }
        
        return view('tratamientos.index', compact('tratamientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prestadores = Prestador::join('personas', 'prestadores.persona_id', 'personas.id')
            ->where('esta_activo', true)
            ->orderBy('apellido', 'desc')
            ->select('personas.*', 'prestadores.*')
            ->get();

        $pacientes = Paciente::join('personas', 'pacientes.persona_id', 'personas.id')
            ->where('esta_activo', true)
            ->orderBy('apellido', 'desc')
            ->select('personas.*', 'pacientes.*')
            ->get();

        return view('tratamientos.create')->with(compact('prestadores'))->with(compact('pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTratamiento $request)
    {
        $tratamiento_activo = Tratamiento::select('fecha_inicio')
            ->where('esta_activo', true)
            ->where('paciente_id', $request->paciente_id)
            ->first();

        if (!empty($tratamiento_activo)) {
            $error = ['tratamiento_activo' => 'Existe un tratamiento activo para el paciente seleccionado'];
            return redirect()->route('tratamientos.create')->withErrors($error)->withInput();
        }

        $datos = $request->all();

        $datos['esta_activo'] = $request->has('esta_activo');

        $tratamiento = Tratamiento::create($datos);

        return redirect()->route('tratamientos.show', $tratamiento)->with('create', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tratamiento $tratamiento)
    {
        $servicios = Servicio::all();

        $prestaciones = Prestacion::join('tratamientos', 'tratamientos.id', 'prestaciones.tratamiento_id')
            ->where('tratamiento_id', $tratamiento->id)
            ->get();

        $prestadores = Prestador::join('personas', 'prestadores.persona_id', 'personas.id')
            ->where('esta_activo', true)
            ->orderBy('apellido', 'desc')
            ->select('personas.*', 'prestadores.*')
            ->get();

        return view('tratamientos.show', compact('tratamiento'))->with(compact('prestadores'))->with(compact('servicios'))->with(compact('prestaciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
