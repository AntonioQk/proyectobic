<?php

use App\Http\Controllers\BicicletaController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

//LOGIN Y REGISTRO
//muestra la vista del formulario para el login
Route::view('/', 'login')->name('login');
//verificar los datos ingresados para realizar el login
Route::POST('/login', [UsuarioController::class, 'login'])->name('usuario.login');
//REGISTRO------
//muestra la vista del form para crear una nueva cuenta de cliente
Route::view('/registro', 'registro')->name('registro');
//crear cuenta cliente, se mandan los datos a la funcion store para despues mandarla a la BD
Route::POST('/crearCuenta', [UsuarioController::class, 'store'])->name('usuario.store');
//----------------------------------------------------------

//AGREGAR NUEVA CUENTA ADMIN
//se llama a la funcion create, la cual solo retorna la vista del form para crear cuenta admin
Route::get('/agregarAdmin', [UsuarioController::class, 'create'])->name('usuario.create');
//Crear cuenta admini, se mandan los datos  a la funcion store para despues mandarlos a la BD
Route::POST('/crearAdmin', [UsuarioController::class, 'store'])->name('usuario.store');
//--------------------------------------------------------------------


//RUTAS PARA BICICLETAS ADMIN

//ver bicicletas
Route::get('/HomeAdmin', [BicicletaController::class, 'index'])->name('lista.index')->middleware('auth')->middleware('admin');
//Llenar form para nueva bici
Route::get('/agregarBici', [BicicletaController::class, 'create'])->name('bicicleta.create')->middleware('auth')->middleware('admin');
//Mandar los datos a la BD
Route::POST('/biciAgregar', [BicicletaController::class, 'store'])->name('bicicleta.store')->middleware('auth')->middleware('admin');
//actualizar datos de la tabla de bicicletas
Route::put('/biciUpdate/{id}', [BicicletaController::class, 'update'])->name('bicicleta.update')->middleware('auth')->middleware('admin');

//-----------------------------------------------------

//RUTAS PARA EQUIPOS
//ver equipos
Route::get('/verEquipo_admin', [EquipoController::class, 'index'])->name('lista.equipo')->middleware('auth')->middleware('admin');
//Llenar form para nuevo equipo
Route::get('/agregarEquipo', [EquipoController::class, 'create'])->name('equipo.create')->middleware('auth')->middleware('admin');
//Mandar los datos a la BD
Route::POST('/equipoAgregar', [EquipoController::class, 'store'])->name('equipo.store')->middleware('auth')->middleware('admin');
//actualizar datos de la tabla de equipos
Route::put('/equipoUpdate/{id}', [EquipoController::class, 'update'])->name('equipo.update')->middleware('auth')->middleware('admin');
//-------------------------------------------------------

//RUTAS PARA BICICLETAS CLIENTE
//ver bicicletas
Route::get('/HomeCliente', [BicicletaController::class, 'index2'])->name('listaCliente.index')->middleware('auth');
//-------------------------------------------------------

//RUTAS PARA EQUIPOS CLIENTE
//ver equipos
Route::get('/verEquipo_cliente', [EquipoController::class, 'index2'])->name('listaCliente.equipo')->middleware('auth');
//---------------------------------------------------------

//RUTA DE CONTACTO Y SOBRE NOSOTROS CLIENTE
//SOBRE NOSOTROS
Route::view('/about', 'cliente/nosotros')->name('sobreNosotros');
//CONTACTO
Route::view('/contacto', 'cliente/contacto')->name('contacto');

//RUTAS PARA LOS FILTROS ADMIN_BICIS
//filtro disponibles
Route::get('/HomeAdmin/disponibles', [BicicletaController::class, 'index_dispo'])->name('lista.index_dispo')->middleware('auth');
//filtro ocupados
Route::get('/HomeAdmin/ocupados', [BicicletaController::class, 'index_ocu'])->name('lista.index_ocu')->middleware('auth');
//filtro fuera de servicio
Route::get('/HomeAdmin/fuera', [BicicletaController::class, 'index_fuera'])->name('lista.index_fuera')->middleware('auth');
//-----------------------------------------------------------



//RUTAS PARA LOS FILTROS ADMIN_EQUIPOS
//filtro disponibles
Route::get('/verEquipo_admin/disponibles', [EquipoController::class, 'index_dispo'])->name('lista.equipo_dispo')->middleware('auth');
//filtro fuera de servicio
Route::get('/verEquipo_admin/fuera', [EquipoController::class, 'index_fuera'])->name('lista.equipo_fuera')->middleware('auth');
//-------------------------------------------------------------


//RUTA DEL BOTON DE ELIMINAR BICICLETA
Route::get('/bicicletaEliminar/{id}', [BicicletaController::class, 'eliminar'])->name('bicicleta.eliminar')->middleware('auth');
//-----------------------------------------------------------



//ruta para logout
Route::get('/logout', [UsuarioController::class, 'logout'])->name('usuario.logout')->middleware('auth');
//------------------------------------------------------------
