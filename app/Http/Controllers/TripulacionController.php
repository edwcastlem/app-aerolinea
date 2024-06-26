<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tripulacion;
use Illuminate\Support\Facades\Validator;

class TripulacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $tripulaciones = Tripulacion::all();

            // Seleccionar los campos deseados
            $tripulacionDTO = $tripulaciones->map(function($tripulaciones) {
                return [
                    'id' => $tripulaciones->idTripulacion,
                    'nombres' => $tripulaciones->nombres,
                    'apellidos' => $tripulaciones->apellidos,
                    'dni' => $tripulaciones->dni,
                    'cargo' => $tripulaciones->cargo
                ];
            });

            return response()->json(['data' => $tripulacionDTO]);
        }

        return view('admin.tripulacion.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // creacion de tripulacion por ajax
        $validator = Validator::make($request->all(), [
            'nombres' => ['required', 'string', 'max:45'],
            'apellidos' => ['required', 'string', 'max:45'],
            'dni' => ['required', 'string', 'max:8'],
            'cargo' => ['required', 'string', 'max:20'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $tripulacion = Tripulacion::create($request->all());

        return response()->json([
            'success' => true,
            'data' => $tripulacion
        ]);
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
    public function update(Request $request, Tripulacion $tripulacion)
    {
        $validator = Validator::make($request->all(), [
            'nombres' => ['required', 'string', 'max:45'],
            'apellidos' => ['required', 'string', 'max:45'],
            'dni' => ['required', 'string', 'max:8'],
            'cargo' => ['required', 'string', 'max:45'],
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $tripulacion->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $tripulacion
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tripulacion $tripulacion)
    {
        $tripulacion->delete();
        return response()->json([
            'success' => true
        ]);
    }
}
