<?php

namespace App\Http\Controllers;

use App\Models\General;
// use App\Models\Medidas;
use App\Models\PadronCatastral;
// use App\Models\Propietarios;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;


class GeneralesController extends Controller
{
  // Este es el que deberia de ser el dash
  public function servicios(Request $request): Response
  {
    return Inertia::render('Servicios/TramiteAlineacion');
    // return Inertia::render('Servicios/TramiteAlineacion', [
    //     'mustVerifyEmail' => $request->user()->hasRole('validador') instanceof MustVerifyEmail,
    //     'status' => session('status'),
    // ]);
  }

  public function actualizarServicio($id, Request $request): Response
  {
    $padronCatastral = PadronCatastral::where('id', $id)->first();
    return Inertia::render('Formalitie/UpdateProcedure', [
      'mustVerifyEmail' => $request->user()->hasRole('validador') instanceof MustVerifyEmail,
      'status' => session('status'),
      'data' => $padronCatastral
    ]);
  }

  public function validacion(Request $request): Response
  {
    return Inertia::render('Formalitie/Validation', [
      'mustVerifyEmail' => $request->user()->hasRole('validador') instanceof MustVerifyEmail,
      'status' => session('status'),
    ]);
  }

  public function findByClave(Request $request)
  {
    try {
      $generales = Generales::where('clave_catastral', $request->input('clave'))->get();
      return response()->json($generales);
    } catch (\Throwable $th) {
      return response()->json($th);
    }
  }

  public function findByGeneralCatastralKey(Request $request)
  {
    try {
      $generales = PadronCatastral::where('clave_catastral', $request->input('clave'))->get();
      // $generales[0]->generales = Generales::where('clave_catastral', $request->input('clave'))->get();
      // $generales[0]->medidas = Medidas::where('clave_catastral', $request->input('clave'))->get();

      return response()->json($generales);
    } catch (\Throwable $th) {
      return response()->json($th);
    }
  }
}
