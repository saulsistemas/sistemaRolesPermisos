<?php

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\DetalleVentaController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VentaController;

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
Route::get('home', [HomeController::class,'index'])->middleware('can:home.index')->name('home');
Route::resource('categorias',CategoriaController::class)->names('categorias');
Route::resource('clientes',ClienteController::class)->names('clientes');
Route::resource('productos',ProductoController::class)->names('productos');
Route::resource('ventas',VentaController::class)->names('ventas');
Route::resource('users',UserController::class)->only(['index','edit','update'])->names('users');
Route::resource('roles',RoleController::class)->except('show')->names('roles');

Route::get('ventas/detalleventas/{venta}/', [DetalleVentaController::class, 'create'])->name('detalleventas.create');
Route::post('ventas/detalleventas/', [DetalleVentaController::class, 'store'])->name('detalleventas.store');
Route::delete('ventas/detalleventas/{detalleventa}/', [DetalleVentaController::class, 'destroy'])->name('detalleventas.destroy');

#Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
#    return view('dashboard');
#})->name('dashboard');
