<?php

namespace App\Http\Controllers;

use App\Models\PadronCatastral;
use Illuminate\Http\Request;

class PadronCatastralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
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
        //
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
}
