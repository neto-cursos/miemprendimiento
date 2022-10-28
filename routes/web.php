<?php


use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\WebAuth\WebAuthController;

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

Route::post('/webauth/signin', [WebAuthController::class, 'signIn']);
Route::post('/webauth/logout', [WebAuthController::class, 'logOut']);

Auth::routes();
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/panelcontrol', function () {
        return view('admin.home');
    })->name('panelcontrol');
    Route::resource('users', App\Http\Controllers\admin\UserController::class)
        ->missing(function (Request $request) {
            return Redirect::route('users.index');
        });
    Route::resource('emprendimientos', App\Http\Controllers\admin\EmprendimientoController::class)
        ->missing(function (Request $request) {
            return Redirect::route('emprendimientos.index');
        });
        Route::resource('modulos', App\Http\Controllers\admin\ModuloController::class)
        ->missing(function (Request $request) {
            return Redirect::route('modulos.index');
        });
        Route::resource('preguntas', App\Http\Controllers\admin\PreguntaController::class)
        ->missing(function (Request $request) {
            return Redirect::route('preguntas.index');
        });
        Route::resource('canvas', App\Http\Controllers\admin\CanvaController::class)
        ->missing(function (Request $request) {
            return Redirect::route('canvas.index');
        });
        Route::resource('respuestas', App\Http\Controllers\admin\RespuestaController::class)
        ->missing(function (Request $request) {
            return Redirect::route('respuestas.index');
        });
        Route::resource('sugerencias', App\Http\Controllers\admin\SugerenciaController::class)
        ->missing(function (Request $request) {
            return Redirect::route('sugerencias.index');
        });



});
