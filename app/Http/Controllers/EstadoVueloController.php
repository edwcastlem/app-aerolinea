<?php

namespace App\Http\Controllers;

use App\Models\Estadovuelo;
use Illuminate\Http\Request;

class EstadoVueloController extends Controller
{
    public function list()
    {
        $estadoVuelos = Estadovuelo::pluck('estado', 'idEstadoVuelo');
        
        return response()->json([
            'success' => true,
            'data' => $estadoVuelos
        ]);
    }
}
