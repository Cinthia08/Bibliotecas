<?php

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
Route::get('inicio',function(){
    return view('layout.index');
});

Route::get('lector',function(){
    return view('lectores');
});

Route::get('libro',function(){
    return view('libros');
});

Route::get('prestamo',function(){
    return view('prestamos');
});

Route::get('biblio',function(){
    return view('bibliotecas');
});

Route::get('ini',function(){
    return view('inises');
 });

Route::get('registra',function(){
    return view('registro');
 });

Route::view('vis','vista');

//Rutas de Apis

Route::apiResource('apibiblioteca','bibliotecaController');
Route::view('biblio','bibliotecas');

Route::apiResource('apilibro','libroController');
Route::view('libro','libros');

Route::apiResource('apiprestamo','prestamoController');
Route::view('prestamo','prestamos');

Route::apiResource('apilector','lectorController');
Route::view('lector','lectores');

Route::post('validar','ApiUsuarioController@validar');