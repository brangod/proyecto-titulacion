<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RecursoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;

Route::middleware(['can:admin.dashboard'])->group(function () {
    Route::get('admin', [HomeController::class, 'index'])->name('admin.index');
    Route::get('admin/historial/{id}', [HomeController::class, 'hist'])->name('admin.historial');
    Route::get('admin/recurso/{tipo}', [RecursoController::class, 'index'])->name('admin.recurso.index');
    Route::get('admin/solicitudes', [HomeController::class, 'solicitud'])->name('admin.solicitudes');
    Route::get('admin/tipos', [HomeController::class, 'tipo'])->name('admin.tipos');
    Route::get('admin/categorias', [HomeController::class, 'categorias'])->name('admin.categorias');
    Route::get('admin/lista/usuarios', [HomeController::class, 'usuarios'])->name('admin.usuarios');
    Route::get('admin/usuario/{id_user}', [HomeController::class, 'uhist'])->name('admin.usuarios.hist');

    Route::get('admin/estados-recursos', [HomeController::class, 'estado_recursos'])->name('admin.estados');
    Route::get('admin/estados-solicitudes', [HomeController::class, 'estado_solicitudes'])->name('admin.estados.solicitudes');

    Route::get('/material/historial/{id}', [PdfController::class,'material_historial'])->name('pdf.material.historial');
    Route::get('/admin/usuario/historial/{u_id}', [PdfController::class,'admin_uhist'])->name('pdf.uhist');
    Route::get('/lista/recursos/{tipo_id}', [PdfController::class,'lista_recursos'])->name('pdf.lista.recursos');
});
