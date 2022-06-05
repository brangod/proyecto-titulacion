<?php

use App\Http\Controllers\PdfController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('bienvenida');
})->name('index');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {    
    Route::get('/dashboard', [HomeController::class,'index'])->name('dashboard.inicio');
    Route::get('/dashboard/recurso/{mid}',[HomeController::class,'material'])->middleware('can:user.dashboard')->name('dashboard.recurso');
    Route::get('/dashboard/historial', [HomeController::class,'historial'])->middleware('can:user.dashboard')->name('dashboard.historial');
    Route::get('/dashboard/solicitudes', [HomeController::class,'solicitudes'])->middleware('can:user.dashboard')->name('dashboard.solicitudes');
    Route::get('/usuario/historial', [PdfController::class,'usuario_historial'])->middleware('can:user.dashboard')->name('pdf.usuario.historial');
});
