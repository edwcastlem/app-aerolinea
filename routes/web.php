<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AvionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TripulacionController;


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
        return view('admin.index');
    })->name('admin.dashboard');

    Route::get('/vuelos', function() {
        return view('admin.vuelos');
    })->name('admin.vuelos');

    Route::get('/reservas', function() {
        return view('admin.index');
    })->name('admin.reservas');


    Route::name('admin.')->group( function() {
        Route::apiResource('usuarios', UsuarioController::class);
        Route::apiResource('tripulacion', TripulacionController::class);
        Route::apiResource('aviones', AvionController::class);
    });

});

require __DIR__.'/auth.php';
