<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::all();

        if ($request->ajax()) {

            // Seleccionar los campos deseados
            $usuariosDTO = $users->map(function($user) {
                return [
                    'id' => $user->id,
                    'nombres' => $user->nombres,
                    'apellidos' => $user->apellidos,
                    'email' => $user->email,
                    'dni' => $user->dni,
                    'telefono' => $user->telefono,
                    'fechaNac' => Carbon::parse($user->fechaNac)->format('d/m/Y'),
                    'rol' => $user->rol->descripcion
                ];
            });

            return response()->json(['data' => $usuariosDTO]);
        }

        return view('admin.usuarios.index', compact('users'));
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
        $request->validate([
            'nombres' => ['required', 'string', 'max:45'],
            'apellidos' => ['required', 'string', 'max:45'],
            'dni' => ['required', 'string', 'max:8'],
            'fechaNac' => ['required', 'string', 'max:45'],
            'telefono' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $rol = ($request->rol == "admin") ? 2 : 1;

        User::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'dni' => $request->dni,
            'fechaNac' => $request->fechaNac,
            'telefono' => $request->telefono,
            'idRol' => $rol,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('admin.usuario.index', absolute: false));
        //return view('admin.usuario.index');
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
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombres' => ['required', 'string', 'max:45'],
            'apellidos' => ['required', 'string', 'max:45'],
            'dni' => ['required', 'string', 'max:8'],
            'fechaNac' => ['required', 'string', 'max:45'],
            'telefono' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
