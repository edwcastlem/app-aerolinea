<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vuelo;
use App\Http\Requests\VueloRequest;
use Carbon\Carbon;

class VueloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $vuelos = Vuelo::all();

        if ($request->ajax()) {

            // Seleccionar los campos deseados
            $vueloDTO = $vuelos->map(function($vuelo) {
                return [
                    'id' => $vuelo->idVuelo,
                    'nroVuelo' => $vuelo->nroVuelo,
                    'origen' => $vuelo->origen,
                    'destino' => $vuelo->destino,
                    'fechaSalida' => $vuelo->fechaSalida,
                    'fechaLlegada' => $vuelo->fechaLlegada,
                    'precio' => $vuelo->precio, 
                    'terminal' => $vuelo->terminal,
                    'puerta' => $vuelo->puerta,
                    'idEstadoVuelo' => $vuelo->idEstadoVuelo,
                    'estadoVuelo' => $vuelo->estadoVuelo->estado,
                    'idAvion' => $vuelo->idAvion,
                    'avion' => $vuelo->avion->modelo,
                ];
            });

            return response()->json([
                'success' => true,
                'data' => $vueloDTO
            ]);
        }

        return view('admin.vuelos.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VueloRequest $request)
    {
        $vuelo = Vuelo::create($request->all());

        return response()->json([
            'success' => true,
            'data' => $vuelo
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vuelo = Vuelo::find($id);
        $vuelo->delete();
        return response()->json([
            'success' => true
        ]);
    }
}
