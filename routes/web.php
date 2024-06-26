<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AvionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TripulacionController;
use App\Http\Controllers\VueloController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\EstadoVueloController;
use App\Http\Controllers\RolController;

use App\Models\User;
use App\Models\Vuelo;
use App\Models\Reserva;


Route::get('/', function (){
    return view('front.index');
})->name("front.home");

Route::get('/dashboard', function () {
    return view('front.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    //usuario autenticado
    Route::get('/', function() {

        $nroUsuarios = User::count();
        $nroVuelos = Vuelo::count();
        $nroReservas = Reserva::count();

        return view('admin.index', compact('nroUsuarios', 'nroVuelos', 'nroReservas'));
    })->name('admin.dashboard');

    Route::name('admin.')->group( function() {
        Route::apiResource('usuarios', UsuarioController::class);
        Route::apiResource('tripulacion', TripulacionController::class);
        Route::apiResource('aviones', AvionController::class);
        Route::apiResource('vuelos', VueloController::class);
        Route::apiResource('reservas', ReservaController::class);
    });

});

//Rutas para selects, etc
Route::get('aviones/list', [AvionController::class, 'list'])->name('admin.aviones.list');
Route::get('estadovuelo/list', [EstadoVueloController::class, 'list'])->name('admin.estadovuelo.list');
Route::get('roles/list', [RolController::class, 'list'])->name('admin.roles.list');

require __DIR__.'/auth.php';
