<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;

class RolController extends Controller
{
    public function list()
    {
        $roles = Rol::pluck('descripcion', 'idRol');
            
        return response()->json([
            'success' => true,
            'data' => $roles
        ]);
    }
}
