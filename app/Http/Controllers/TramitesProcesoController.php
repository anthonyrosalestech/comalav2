<?php

namespace App\Http\Controllers;

use App\Models\TramitesProceso;
use Illuminate\Http\Request;

class TramitesProcesoController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //Obtener todos los registros
    $tramitesProceso = TramitesProceso::all();
    return response()->json($tramitesProceso);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $tramitesProceso = new TramitesProceso;
    $tramitesProceso->id_padron_catastral = $request->id_padron_catastral ? $request->id_padron_catastral : "";
    $tramitesProceso->id_tipo_tramite = $request->id_tipo_tramite ? $request->id_tipo_tramite : "";
    $tramitesProceso->id_tipo_proceso = $request->id_tipo_proceso ? $request->id_tipo_proceso : "";
    $tramitesProceso->id_uso_suelo = $request->id_uso_suelo ? $request->id_uso_suelo : "";
    $tramitesProceso->nooficial = $request->nooficial ? $request->nooficial : "";
    $tramitesProceso->elaboro = $request->elaboro ? $request->elaboro : "";
    $tramitesProceso->reviso = $request->reviso ? $request->reviso : "";
    $tramitesProceso->certifico = $request->certifico ? $request->certifico : "";
    $tramitesProceso->entrega = $request->entrega ? $request->entrega : "";
    $tramitesProceso->historico = $request->historico ? $request->historico : "";
    $tramitesProceso->save();
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $tramitesProceso = TramitesProceso::find($id);
    return response()->json($tramitesProceso);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request)
  {
    $tramitesProceso = TramitesProceso::find($request->id);
    $tramitesProceso->id_padron_catastral = $request->id_padron_catastral ? $request->id_padron_catastral : $tramitesProceso->id_padron_catastral;
    $tramitesProceso->id_tipo_tramite = $request->id_tipo_tramite ? $request->id_tipo_tramite : $tramitesProceso->id_tipo_tramite;
    $tramitesProceso->id_tipo_proceso = $request->id_tipo_proceso ? $request->id_tipo_proceso : $tramitesProceso->id_tipo_proceso;
    $tramitesProceso->id_uso_suelo = $request->id_uso_suelo ? $request->id_uso_suelo : $tramitesProceso->id_uso_suelo;
    $tramitesProceso->nooficial = $request->nooficial ? $request->nooficial : $tramitesProceso->nooficial;
    $tramitesProceso->elaboro = $request->elaboro ? $request->elaboro : $tramitesProceso->elaboro;
    $tramitesProceso->reviso = $request->reviso ? $request->reviso : $tramitesProceso->reviso;
    $tramitesProceso->certifico = $request->certifico ? $request->certifico : $tramitesProceso->certifico;
    $tramitesProceso->entrega = $request->entrega ? $request->entrega : $tramitesProceso->entrega;
    $tramitesProceso->historico = $request->historico ? $request->historico : $tramitesProceso->historico;

    $tramitesProceso->save();



    // $post->update($request->all());

    // return redirect()->route('posts.index')
    // ->with('success', 'Post updated successfully.');
    return response()->json($tramitesProceso);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
