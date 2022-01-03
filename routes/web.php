<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\TodoController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DepartmentController;
use App\Models\User;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // $users = User::all(); // Eloquent
    $users = DB::table('users')->get(); // Query Builder
    return view('dashboard', compact('users'));
})->name('dashboard');

// Department
Route::get('/department', [DepartmentController::class, 'index'])->name('department');
