<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
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

// Route::get('/empleado', function () {
//     return view('empleados.index');
// });

// Route::get('/empleado/crear', [EmpleadoController::class, 'create']);

Route::resource('empleado', EmpleadoController::class)->middleware('auth'); //Este middleware nos sirve para que el usuario tenga que ajuro estar autenticado 
Auth::routes(['register'=>false, 'reset'=>false]); //esto ultimo sirve para invalidar estas rutas en este caso register y reset

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function () {

    Route::get('/', [EmpleadoController::class, 'index'])->name('home');
});
