<?php

namespace App\Http\Controllers;

use App\Models\Archivos;
use App\Models\General;
use App\Models\PadronCatastral;
use App\Models\Tramitantes;
use App\Models\TramitesProceso;
use App\Models\UsoSuelo;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use PhpParser\Node\Expr\Cast\Object_;

class PadronCatastralController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //Obtener todos los registros
    $padron = PadronCatastral::all();
    return response()->json($padron);
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
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $padron = PadronCatastral::find($id);
    return response()->json($padron);
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
  public function update(Request $request, string $id)
  {
    $request->validate([
      'title' => 'required|max:255',
      'body' => 'required',
    ]);
    $post = PadronCatastral::find($id);
    $post->update($request->all());

    // return redirect()->route('posts.index')
    // ->with('success', 'Post updated successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }

  public function findByClaveOrNameInOwners(Request $request)
  {
    try {
      $data = PadronCatastral::findUserByName($request->input("value"))
        ->orWhere('clave_catastral', 'like', '%' . $request->input('value') . '%')
        // ->orWhere('clave_catastral', 'like', '%' . $request->input('value') . '%')->paginate($perPage = 15, $columns = ['*'], $pageName = 'page');
        ->take(5)
        ->get();
      return response()->json($data);
    } catch (\Throwable $th) {
      return response()->json($th);
    }
  }

  public function nuevoTramite(Request $request)
  {
    // dd($request->all());
    return Inertia::render('Padron/Padron', [
      'mustVerifyEmail' => $request->user()->hasRole('validador') instanceof MustVerifyEmail,
      'status' => session('status'),
      'id_tipo_tramites' => $request->id
    ]);
  }

  function crearNuevoTramite($data)
  {
    try {
      $tramite = TramitesProceso::where('id_padron_catastral', $data->id_padron_catastral)->first();

      if (!$tramite) {
        $tramite = new TramitesProceso();
        $tramite->id_padron_catastral = $data->id_padron_catastral;
        $tramite->id_tipo_tramite = $data->id_tipo_tramite;
        $tramite->id_tipo_proceso = 1;
        $tramite->save();
      }


      return $tramite;
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function nuevoTramitePorId($id, Request $request)
  {

    $padron_catastral = PadronCatastral::find($id);
    $general = General::where('clave_catastral', $padron_catastral->clave_catastral)->get();
    $uso_suelo = UsoSuelo::all();
    $documentos = Archivos::where('clave_catastral', $padron_catastral->clave_catastral)->get();

    $data = (object) [
      'id_padron_catastral' => $padron_catastral->id . "",
      'id_tipo_tramite' => $request->id,
    ];

    $response = $this->crearNuevoTramite($data);


    // dd($response);

    return Inertia::render('Padron/NuevoTramite', [
      'mustVerifyEmail' => $request->user(),
      'status' => auth()->user(),
      'padron' => $padron_catastral,
      'general' => $general,
      'usoSuelo' => $uso_suelo,
      'documentos' => $documentos,
      'idProceso' => $response->id,
      'tramitador' => Tramitantes::where('id_tramite_proceso', $response->id)->first(),
    ]);
  }
}
