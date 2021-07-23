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



Auth::routes(['verify' => true]);

//Ruta para consultar lo direccionado por la EPS
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/history', 'HistoryController@index')->name('history');

// //Ruta que se usa para enviar por el servicio put a programar las prescripciones desde la function index
// Route::post('/programar', 'HomeController@Programarm')->name('programar');

// //Ruta para consultar lo programado por el regente o administrador
// Route::get('/programado', 'HomeController@indexp')->name('programado');

// //Ruta que se usa para enviar por el servicio put a anular lo programado desde la function indexp
// Route::post('/a-programar', 'HomeController@Anularprogramacion')->name('a-programar');

// //Ruta que se usa para enviar por el servicio put el reporte de la dispensación desde la function indexd
// Route::post('/dispensado', 'HomeController@Reportardispensacion')->name('dispensado');

// //Ruta que se usa para direccionar a la vista del ingreso del token hercules
// Route::get('/tokenhercules', 'HomeController@tokenherculesindex')->name('tokenhercules');

// //Ruta que se usa para enviar por el servicio put a generar el token del ws
// Route::post('/tokenhercules_token', 'HomeController@tokenhercules')->name('tokenhercules1');

// //Ruta para consultar lo entregado
// Route::get('/entregado', 'HomeController@indexe')->name('entregado');

// //Ruta que se usa para enviar por el servicio put a anular lo entregado desde la function indexe
// Route::post('/a-entrega', 'HomeController@Anularentrega')->name('a-entrega');


// //Ruta para consultar lo reportado y entregado
// Route::get('/repentregado', 'HomeController@indexrepe')->name('repentregado');

// //Ruta que se usa para enviar por el servicio put el reporte de lo entregado desde la function indexe
// Route::post('/r-entrega', 'HomeController@Reportarentrega')->name('r-entrega');

// //Ruta que se usa para enviar por el servicio put a anular el reporte de entrega desde la function indexrepe
// Route::post('/a-rentrega', 'HomeController@Anularrentrega')->name('a-rentrega');

// //Ruta que se usa para enviar por el servicio put el reporte de lo facturado desde la function indexrepe
// Route::post('/r-factura', 'HomeController@Reportarfactura')->name('r-factura');

// //Ruta para consultar lo facturado
// Route::get('/facturado', 'HomeController@indexf')->name('facturado');

// //Ruta que se usa para enviar por el servicio put a anular el reporte de lo facturado desde la function indexf
// Route::post('/a-facturado', 'HomeController@Anularfactura')->name('a-facturado');

