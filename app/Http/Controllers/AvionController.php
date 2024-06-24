<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvionRequest;
use Illuminate\Http\Request;
use App\Models\Avion;

class AvionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $aviones = Avion::all();

        if ($request->ajax()) {

            // Seleccionar los campos deseados
            $avionDTO = $aviones->map(function($avion) {
                return [
                    'id' => $avion->idAvion,
                    'modelo' => $avion->modelo,
                    'nroRegistro' => $avion->nroRegistro,
                    'capacidad' => $avion->capacidad
                ];
            });

            return response()->json([
                'success' => true,
                'data' => $avionDTO
            ], 200);
        }

        return view('admin.aviones.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AvionRequest $request)
    {
        $avion = Avion::create($request->all());
        //dd($avion);

        return response()->json([
            'success' => true,
            'data' => $avion
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AvionRequest $request, String $id)
    {
        $avion = Avion::find($id);
        $avion->update($request->validated());

        $result = $avion->update($request->validated());

        if ($result) {
            return response()->json([
                'success' => true,
                'data' => $avion
            ]);
        }
        else
        {
            return response()->json([
                'success' => false,
                'data' => "Hubo errores"
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $avion = Avion::find($id);
        $avion->delete();
        return response()->json([
            'success' => true
        ]);
    }
}
