<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controladorMacuin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

*/

//RUTAS LOGIN
Route::get('/',[controladorMacuin::class,'loginInicio']);


//RUTA VISTA CLIENTE
Route::get('cliente', [controladorMacuin::class, 'indexCliente']);