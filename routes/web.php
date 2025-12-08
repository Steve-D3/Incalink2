<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\GrupoController;

Route::get('/', function () {
    return Inertia::render('welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        $grupos = \App\Models\Grupo::with('menus')->get();
        return Inertia::render('dashboard', [
            'grupos' => $grupos,
        ]);
    })->name('dashboard');

    Route::resource('grupos', GrupoController::class);
});

require __DIR__ . '/settings.php';
