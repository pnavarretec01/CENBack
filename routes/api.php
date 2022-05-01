<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::post('login',  'App\Http\Controllers\ApiAuthController@login');
Route::post('register',  'App\Http\Controllers\ApiAuthController@register');
Route::post('me',  'App\Http\Controllers\ApiAuthController@me');
Route::post('logout',  'App\Http\Controllers\ApiAuthController@logout');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('puntoventa',  'App\Http\Controllers\ApiController@listaPuntoVenta');
    Route::get('regiones',  'App\Http\Controllers\ApiController@listaRegiones');
    Route::get('comunas',  'App\Http\Controllers\ApiController@listaComunas');
    Route::get('tarifas',  'App\Http\Controllers\ApiController@listaTarifaElectrica');
    Route::get('calificaciones',  'App\Http\Controllers\ApiController@listaCalificaciones');
    Route::post('calificaciones/agregar',  'App\Http\Controllers\ApiController@insertCalificaciones');

});
//Route::post('/puntoventa',  'App\Http\Controllers\ApiController@listaPuntoVenta');
