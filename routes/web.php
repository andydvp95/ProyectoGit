<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/main', function() {
    return view('main');
});

#Route::accion(...)
Route::resource('estudiantes', 'EstudiantesController');
#apunta a GET - POST - PUT - DELETE - SHOW

Route::get('/tareas/buscar', 'TareasController@buscar')->name('tareas.buscar');

Route::get('/tareas/{id}/ver/{limitar?}', 'TareasController@ver')->name('tareas.ver');

#myproject/admin/*
Route::group(['prefix' => 'admin', 'middleware' => 'is_admin', 'as' => 'admin.'], function(){

    Route::get('/dashboard', 'DashboardController@index')->name('dasboard.index');

});


Route::resource('tareas', 'TareasController');
//Route::put('tareas/{id}/edit', 'TareasController@edit');


Route::get('errores', function(){
    abort(401);
});

