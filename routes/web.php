<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\StudentController;

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

// Route::get('/todo', function () {
//     return view('todo');
// });

// Route::get('/todo', 'TodoController@index'); //  Old Laravel Version
Route::get('/todo', [TodoController::class, 'index'])->name('todo');
Route::get('/todo/update/{id}', [TodoController::class, 'updateView'])->name('updateView');
Route::get('/todo/delete/{id}', [TodoController::class, 'delete'])->name('deleteTodo');
Route::post('/todo/store', [TodoController::class, 'store'])->name('storeTodo');
Route::post('/todo/actionUpdate', [TodoController::class, 'actionUpdate'])->name('actionUpdate');

Route::get('/student', [StudentController::class, 'index'])->name('student');
