<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controladorMacuin;
use App\Http\Controllers\ControladorMacuin_Vistas;
use App\Http\Controllers\ControladorPDF;

//RUTAS LOGIN
Route::get('/',[ControladorMacuin_Vistas::class,'loginInicio'])->name('login');
Route::post('/', [controladorMacuin::class, 'login_v'])->name("login.v");
Route::get('logout', [ControladorMacuin::class, 'salir'])->name('logout');

//RUTAS REGISTRAR USUARIO
Route::get('registro', [ControladorMacuin_Vistas::class, 'registrarUsu'])->name('apo.regisCli');
Route::post('registro', [controladorMacuin::class, 'registrar_v']);

//RUTAS CLIENTE
Route::get('cliente', [ControladorMacuin_Vistas::class, 'indexCliente'])->name('cliente');
Route::post('ticket', [controladorMacuin::class, 'insertTicket']);
Route::put('cancelar/{id}', [controladorMacuin::class, 'cancelTicket'])->name('cancel');
Route::put('cliente_edit/{id}', [controladorMacuin::class, 'editarPerfil'])->name('cliente_edit');


//RUTAS JEFE DE SOPORTE
Route::get('soporte', [ControladorMacuin_Vistas::class, 'consultaDepa'])->name('soporte');
Route::post('usuarioNew',[controladorMacuin::class, 'registrarUsuario']);
Route::get('search',[controladorMacuin::class, 'search'])->name('search');
Route::post('departamentoNew',[controladorMacuin::class, 'insertDpto'])->name('regisDpto');
Route::put('dpto_edit/{id}',[controladorMacuin::class, 'editarDpto'])->name('editDpto');
Route::post('asignarTicket/{id}',[controladorMacuin::class, 'asignarTicket'])->name('compartir');
Route::put('soporte_edit/{id}', [controladorMacuin::class, 'editarPerfilSoporte'])->name('soporte_edit');

//RUTAS AUXILIAR
Route::put('comentar/{id}',[controladorMacuin::class,'Comentar_aux'])->name('comentar');
Route::get('search_aux',[controladorMacuin::class,'search_aux'])->name('search_aux');
Route::put('cambio_estatus/{id}', [controladorMacuin::class, 'cambiarEstatus'])->name('cam_estatus');

//RUTAS PROTEGIDAS
Route::middleware('auth')->group(function(){
    Route::get('cliente_rs', [ControladorMacuin_Vistas::class, 'indexCliente'])->name('cliente_rs');
    Route::get('soporte_bo', [ControladorMacuin_Vistas::class, 'consultaDepa'])->name('soporte_bo');
    Route::get('auxiliar_rs',[ControladorMacuin_Vistas::class, 'indexAuxiliar'])->name('auxiliar_rs');
});

// RUTAS PDFS
Route::get('pdf', [ControladorPDF::class, 'pdf'])->name('d_pdf');
Route::post('pdf_aux',[controladorPDF::class, 'pdf_aux'])->name('reporte_aux');
Route::post('pdf_dpto',[controladorPDF::class, 'pdf_departamento'])->name('reporte_dpto');
Route::post('pdf_dpto_aux',[controladorPDF::class,'pdf_dpto_aux'])->name('reporte_dpto_aux');
Route::post('pdf_cls', [ControladorPDF::class, 'pdf_clasificacion'])->name('reporte_cls');
Route::post('pdf_date',[controladorPDF::class, 'pdf_fechas'])->name('reporte_date');
Route::post('pdf_date_aux',[controladorPDF::class, 'pdf_fechas_aux'])->name('reporte_date_aux');
Route::post('pdf_estatus',[controladorPDF::class, 'pdf_estatus'])->name('reporte_estatus');

?>





