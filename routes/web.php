<?php

use App\Http\Controllers\BicicletaController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

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
//LOGIN
Route::view('/', 'login')->name('login');
//REGISTRO
Route::view('/registro', 'registro')->name('registro');
//crear cuenta cliente
Route::POST('/crearCuenta', [UsuarioController::class, 'store'])->name('usuario.store');
//registro admin
Route::get('/agregarAdmin', [UsuarioController::class, 'create'])->name('usuario.create');
//Crear cuenta admini
Route::POST('/crearAdmin', [UsuarioController::class, 'store'])->name('usuario.store');



//RUTAS PARA BICICLETAS ADMIN

//ver bicicletas
Route::get('/HomeAdmin', [BicicletaController::class, 'index'])->name('lista.index');
//Llenar form para nueva bici
Route::get('/agregarBici', [BicicletaController::class, 'create'])->name('bicicleta.create');
//Mandar los datos a la BD
Route::POST('/biciAgregar', [BicicletaController::class, 'store'])->name('bicicleta.store');
//actualizar datos de la tabla de bicicletas
Route::put('/biciUpdate/{id}', [BicicletaController::class, 'update'])->name('bicicleta.update');


//RUTAS PARA EQUIPOS
//ver equipos
Route::get('/verEquipo_admin', [EquipoController::class, 'index'])->name('lista.equipo');
//Llenar form para nuevo equipo
Route::get('/agregarEquipo', [EquipoController::class, 'create'])->name('equipo.create');
//Mandar los datos a la BD
Route::POST('/equipoAgregar', [EquipoController::class, 'store'])->name('equipo.store');
//actualizar datos de la tabla de equipos
Route::put('/equipoUpdate/{id}', [EquipoController::class, 'update'])->name('equipo.update');


//RUTAS PARA BICICLETAS CLIENTE
//ver bicicletas
Route::get('/HomeCliente', [BicicletaController::class, 'index2'])->name('listaCliente.index');


//RUTAS PARA EQUIPOS CLIENTE
//ver equipos
Route::get('/verEquipo_cliente', [EquipoController::class, 'index2'])->name('listaCliente.equipo');


//RUTAS PARA LOS FILTROS ADMIN_BICIS
//filtro disponibles
Route::get('/HomeAdmin/disponibles', [BicicletaController::class, 'index_dispo'])->name('lista.index_dispo');
//filtro ocupados
Route::get('/HomeAdmin/ocupados', [BicicletaController::class, 'index_ocu'])->name('lista.index_ocu');
//filtro fuera de servicio
Route::get('/HomeAdmin/fuera', [BicicletaController::class, 'index_fuera'])->name('lista.index_fuera');

//RUTAS PARA LOS FILTROS ADMIN_EQUIPOS
//filtro disponibles
Route::get('/verEquipo_admin/disponibles', [EquipoController::class, 'index_dispo'])->name('lista.equipo_dispo');
//filtro fuera de servicio
Route::get('/verEquipo_admin/fuera', [EquipoController::class, 'index_fuera'])->name('lista.equipo_fuera');
