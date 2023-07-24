<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get( アドレス , [コントローラーの名前::class , メソッド名] );
// PostsController :: class　->　App \ Http \ Controllers \ TodoListControllerを返している
// index　-> PostController.phpのindexメソッドを呼び出している
Route::get('/list', [TodoListController::class, 'index']);


Route::get('/', function () {
    return view('welcome');
});

