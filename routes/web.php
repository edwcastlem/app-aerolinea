<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/front', function (){
    return view('front.index');
})->name("front");

Route::get('/front/registro', function (){
    return view('front.registro');
})->name('front-registro');

Route::get('/front/password-reset', function (){
    return view('front.olvido-clave');
})->name('front-reset-password');

Route::get('/front/login', function (){
    return view('front.login');
})->name('front-login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //usuario autenticado
    Route::get('front/correcto', function() {
        return view('front.prueba');
    })->name('front-correcto');
});

require __DIR__.'/auth.php';
