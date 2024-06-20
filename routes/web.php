<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;


Route::get('/', function (){
    return view('front.index');
})->name("index");

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

    Route::get('/aviones', function() {
        return view('admin.aviones');
    })->name('admin.aviones');

    Route::get('/tripulacion', function() {
        return view('admin.tripulacion');
    })->name('admin.tripulacion');

    Route::get('/reservas', function() {
        return view('admin.index');
    })->name('admin.reservas');

    Route::resource('usuario', UsuarioController::class, ["as"=>"admin"]);
});

require __DIR__.'/auth.php';
