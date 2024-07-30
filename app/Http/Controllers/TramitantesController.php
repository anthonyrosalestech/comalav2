<?php

namespace App\Http\Controllers;

use App\Models\Tramitantes;
use Illuminate\Http\Request;

class TramitantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request->all());
      $tramitante = Tramitantes::where('id_tramite_proceso', $request->id_tramite_proceso)->first();

      if (!$tramitante) {
        $tramitante = new Tramitantes();
        $tramitante->id_tramite_proceso = $request->id_tramite_proceso;
      }
      $tramitante->nombre = $request->nombre;
      $tramitante->calle = $request->calle;
      $tramitante->localidad = $request->localidad;
      $tramitante->poblacion = $request->poblacion;
      $tramitante->numero = $request->numero;
      $tramitante->codigo_postal = $request->codigo_postal;
      $tramitante->telefono = $request->telefono;
      $tramitante->save();

      return response()->json($tramitante);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
