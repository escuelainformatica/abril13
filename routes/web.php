<?php

use App\Http\Controllers\PostController;
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
Route::get('/post/listado',[PostController::class,'Listar']);
Route::get('/post/insertar',[PostController::class,'InsertarGet']);
Route::post('/post/insertar',[PostController::class,'InsertarPost']);
