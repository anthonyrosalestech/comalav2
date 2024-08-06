<?php

namespace App\Http\Controllers;

use App\Models\Archivos;
use Illuminate\Http\Request;

class ArchivosController extends Controller
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
    $req = json_decode(json_encode($request->input('data')));
    $response = [];
    foreach ($req as &$value) {
      $result = Archivos::where('clave_catastral', $value->clave_catastral)
        ->where('nombre', $value->nombre)->first();

      if (!$result) {
        $result = new Archivos;
      }

      if (!$result->clave_catastral) {
        $result->clave_catastral = $value->clave_catastral;
        $result->id_tramite_proceso = $request->id_tramite_proceso;
      }
      $result->nombre = $value->nombre;
      $result->url = $value->url;
      $result->save();

      array_push($response, $result);
    }

    return response()->json($response);
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

  public function getDocumentsByClave($clave)
  {
    $result = Archivos::where('clave_catastral', $clave)->get();
    return response()->json($result);
  }

  function upload(Request $request)
  {
    $listDocuments = ["titulo_propiedad", "ine", "impuesto_predial", "croquis", "fomato_solicitud_direccion", "formato_cna", "formato_recibo_pago"];
    $urlBase = "app/public/" . $request->input("clave_catastral");
    $respose = [];

    foreach ($listDocuments as &$value) {
      if ($request->hasFile($value)) {
        $url = $urlBase . "/" . $value . "/";
        $file = $request->file($value);
        $res = $this->file($url, $file, $value, $request->input("clave_catastral"));
        array_push($respose, $res);
      }
    }

    return response()->json($respose);
  }

  public function file($url, $file, $name, $clave)
  {
    try {
      $fileName = pathinfo($name, PATHINFO_FILENAME);
      $name_file = str_replace(" ", "_", $fileName);
      $extension = $file->getClientOriginalExtension();
      $newName = $name_file . '.' . $extension;
      $file->move(storage_path($url), $newName);

      return [
        'clave_catastral' => $clave,
        'nombre' => $name,
        'url' => storage_path($url . $newName)
      ];
    } catch (\Throwable $th) {
      //throw $th;
    }
  }
}
