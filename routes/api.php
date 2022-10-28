<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\CanvasController;
use App\Http\Controllers\Api\PreguntasController;
use App\Http\Controllers\Api\RespuestasController;
use App\Http\Controllers\WebAuth\TicketController;
use App\Http\Controllers\Api\CronogramasController;
use App\Http\Controllers\Api\SugerenciasController;
use App\Http\Controllers\Api\EmprendimientosController;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('/tickets', [TicketController::class, 'index'])->middleware('auth:sanctum');
Route::post('auth/registro',[AuthController::class,'register']);
Route::post('auth/token',[AuthController::class,'token']);
Route::post('auth/logout',[AuthController::class,'cerrarSesion']);
Route::post('auth/islogged',[AuthController::class,'testAuth']);
Route::post('nuevoempr',[EmprendimientosController::class,'createEmpr']);
Route::post('updateempr',[EmprendimientosController::class,'updateEmpr']);
Route::post('misemprendimientos',[EmprendimientosController::class,'listEmpr']);
Route::post('queryempr',[EmprendimientosController::class,'queryEmpr']);
Route::post('removeempr',[EmprendimientosController::class,'removeEmpr']);

Route::post('getpreguntas',[PreguntasController::class,'getPreg']);
Route::get('listpreguntas',[PreguntasController::class,'listPreg']);

Route::post('getrespuestas',[RespuestasController::class,'getResp']);
Route::post('listrespuestas',[RespuestasController::class,'listResp']);
Route::post('createrespuestas',[RespuestasController::class,'createResp']);
Route::post('updaterespuestas',[RespuestasController::class,'updateResp']);
Route::post('deleterespuestas',[RespuestasController::class,'deleteResp']);

Route::post('getsugerencias',[SugerenciasController::class,'getSuge']);
Route::post('createsugerencias',[SugerenciasController::class,'createSuge']);
Route::post('updatesugerencias',[SugerenciasController::class,'updateSuge']);
Route::post('deletesugerencias',[SugerenciasController::class,'deleteSuge']);

Route::post('getcanvas',[CanvasController::class,'getCanv']);
Route::post('createcanvas',[CanvasController::class,'createCanv']);
Route::post('updatecanvas',[CanvasController::class,'updateCanv']);
Route::post('deletecanvas',[CanvasController::class,'deleteCanv']);

Route::post('deleterespuestas2',[RespuestasController::class,'deleteRespNotFound']);

Route::post('createcron',[CronogramasController::class,'registerCronWithEmpr']);
Route::post('getcron',[CronogramasController::class,'getCrons']);
Route::post('checkifemprhascron',[CronogramasController::class,'checkIfEmprHasCron']);
Route::post('updatecron',[CronogramasController::class,'actualizarCrons']);
Route::post('deletecron',[CronogramasController::class,'deleteCron']);
Route::post('listcron',[CronogramasController::class,'listCrons']);

//Route::get('/tickets',[TicketController::class,'index'])->middleware('auth:sanctum');
/*
Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('me',[UsersController::class,'me']);
});*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/book', 'BookController@index');*/