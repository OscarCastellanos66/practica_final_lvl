<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CreateOperator;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OperadorController;
use App\Http\Controllers\SolicitudController;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {

    if(auth()->check() && auth()->user()->role == 'admin'){
        return redirect()->route('admin.index');
    }else if(auth()->check() && auth()->user()->role == 'user'){
        return redirect()->route('user.index');
    }else if(auth()->check() && auth()->user()->role == 'operador'){
        return redirect()->route('operador.index');
    }
 
})->middleware('auth')->name('index');

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest') ->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [SessionsController::class, 'create'])->middleware('guest') ->name('login.index');
Route::post('/login', [SessionsController::class, 'store'])->name('login.store');
Route::get('/logout', [SessionsController::class, 'destroy'])->middleware('auth') ->name('login.destroy');

//Administrador
Route::resource('/admin', AdminController::class)->middleware('auth.admin');

Route::get('/admin/{id}/ver', function ($id) {
    $user = DB::table('users')
        ->where('id', $id)
        ->first();
    return view('admin.view', ['user' => $user]);
})->middleware('auth.admin')->name('admin.ver');

Route::resource('/admin/ver/solicitud', SolicitudController::class)->middleware('auth.admin');

//Usuario
Route::get('/user', [UserController::class, 'index'])->middleware('auth.user')->name('user.index');

//Operador
Route::resource('/operador', OperadorController::class)->middleware('auth.operador');
Route::resource('/admin/operator', CreateOperator::class)->middleware('auth.admin');