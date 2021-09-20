<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class ServicioController extends Controller
{
    public function index(){
        $servicios = Servicio::all();

        return view('servicios.index',compact('servicios'));
    }

    public function store(Request $request){
        $request->validate([
            'servicio' => 'required|max:245'
        ]);

        $servicio = new Servicio();

        $servicio->servicio = $request->servicio;

        $servicio->save();

        return redirect()->route('servicios.index')->with('create','ok');
    }
}
