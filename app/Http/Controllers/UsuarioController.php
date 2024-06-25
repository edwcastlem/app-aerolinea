<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::all();

            // Seleccionar los campos deseados
            $usuariosDTO = $users->map(function($user) {
                return [
                    'id' => $user->id,
                    'nombres' => $user->nombres,
                    'apellidos' => $user->apellidos,
                    'email' => $user->email,
                    'dni' => $user->dni,
                    'telefono' => $user->telefono,
                    'fechaNac' => $user->fechaNac,
                    'idRol' => $user->idRol,
                    'rol' => $user->rol->descripcion
                ];
            });

            return response()->json(['data' => $usuariosDTO]);
        }

        return view('admin.usuarios.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = new User();

        if ($request->ajax())
        {
            return view('admin.usuarios.popup', compact('user'));
        }

        return view('admin.usuarios.edit', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // creacion de usuario por ajax
        $validator = Validator::make($request->all(), [
            'nombres' => ['required', 'string', 'max:45'],
            'apellidos' => ['required', 'string', 'max:45'],
            'dni' => ['required', 'string', 'max:8'],
            'fechaNac' => ['required', 'string', 'max:45'],
            'telefono' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $usuario = User::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'dni' => $request->dni,
            'fechaNac' => $request->fechaNac,
            'telefono' => $request->telefono,
            'idRol' => $request->idRol,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'success' => true,
            'data' => $usuario
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
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, User $usuario)
    {
        if ($request->ajax()) {
            return view('admin.usuarios.popup', compact('usuario'));
        }

        return view('admin.usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $usuario)
    {
        $validator = Validator::make($request->all(), [
            'nombres' => ['required', 'string', 'max:45'],
            'apellidos' => ['required', 'string', 'max:45'],
            'dni' => ['required', 'string', 'max:8'],
            'fechaNac' => ['required', 'string', 'max:10'],
            'telefono' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($usuario->id)],
            //'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Actualizar el usuario con los datos validados
        $usuario->fill($validator->validated());
        $usuario->save();

        return response()->json([
            'success' => true,
            'data' => $usuario
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'succes' => false
            ], 500);
        }

        $user->delete();

        return response()->json([
            'success' => true
        ], 200);
        
    }
}
