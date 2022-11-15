<?php

use Illuminate\Http\Request;
use App\Http\Controllers\DespesasController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

#Rotas dos Usuários
Route::post('/register', [AuthController::class , 'register'] );
Route::post('/login', [AuthController::class , 'login'] );

#Auth
Route::group(['middleware' => ['auth:sanctum']], function (){
    #Rotas das Despesas
    Route::get('/despesas', [DespesasController::class , 'index'] );
    Route::get('/despesas/{id}', [DespesasController::class , 'show'] );
    Route::post('/despesas', [DespesasController::class , 'store'] );
    Route::post('/despesas/{id}', [DespesasController::class , 'update'] );
    Route::delete('/despesas/{id}', [DespesasController::class , 'destroy'] );
    Route::post('/logout', [AuthController::class , 'logout'] );
});

