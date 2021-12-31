<?php

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
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
    return view('auth.login');
});
Route::get('home', [HomeController::class,'index'])->name('home');
Route::resource('categorias',CategoriaController::class)->names('categorias');
Route::resource('users',UserController::class)->only(['index','edit','update'])->names('users');
Route::resource('roles',RoleController::class)->names('roles');



#Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
#    return view('dashboard');
#})->name('dashboard');
