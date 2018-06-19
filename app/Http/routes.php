<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Require Authentication
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/','FrontController@admin');
    Route::get('contacto','FrontController@contacto');
    Route::get('reviews','FrontController@reviews');
    Route::get('index', 'FrontController@admin');
    Route::get('admin','FrontController@admin');
    Route::get('home','FrontController@admin');
    Route::resource('usuario','UsuarioController');
    Route::get('usuario/change/data','UsuarioController@changeData');
    Route::post('usuario/change/password','UsuarioController@changePassword')->name('usuario.changepassword');
    Route::resource('carrera','CarreraController');
    Route::resource('modalidad','ModalidadController');
    Route::resource('area','AreaController');
    Route::resource('proyecto','ProyectoController');
    Route::get('subareas/{area}','AreaController@getSubAreas');
    Route::get('profesionals/project/{area}','AsignacionController@getProfesionalsAreaByProject');
    Route::get('tribunales/asignados/{project}','AsignacionController@getTribunalsAssigned');
    Route::get('tribunales/delete/{id}','AsignacionController@deleteTribunal');
    Route::get('filter/by/criterias','ProyectoController@searchProjetCriteria');
    Route::post('filter/by/criterias/result','ProyectoController@filterProjects')->name('proyecto.filter');
    Route::get('cambiar/estado/proyecto/{proyecto}','ProyectoController@cambiarEstado');
    Route::get('reporte/profesional/{profesional}', 'ReporteController@getReportProfesional');
    Route::get('preview/reporte/profesional', 'ReporteController@profesionalReport');


    Route::resource('profesional','ProfesionalController');
    //Rutas Para Auxiliar
    Route::resource('auxiliar', 'AuxiliarController');

    Route::resource('asignacion', 'AsignacionController');
    Route::post('asignacionpost', 'AsignacionController@storePost');
    Route::post('changetribunal', 'AsignacionController@changeTribunal');
    Route::get('asignacionspecific/{project}', 'AsignacionController@createSpecific');

    Route::resource('reporte', 'ReporteController');
});