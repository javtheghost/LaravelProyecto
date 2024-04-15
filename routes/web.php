<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SmsController;
use App\Http\Controllers\Auth\VeryfiController;
use App\Http\Controllers\Auth\ApplicationController;
use App\Http\Controllers\ProductoController;

use App\Models\Producto;
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

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');


Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        $productos = Producto::all(); // Obtén todos los productos
        return view('home', compact('productos')); // Pasa la variable $productos a la vista
    })->name('home');

    // Route::get('/phone', [SmsController::class, 'create'])->name('auth.phone');
    // Route::post('/phone', [SmsController::class, 'store'])->name('auth.store');

    // Route::get('/verification', [VeryfiController::class, 'create'])->name('auth.verification');
    // Route::post('/verification', [VeryfiController::class, 'store'])->name('auth.storeve');

    Route::middleware(['role'])->group(function () {
        Route::get('/products', [ProductoController::class, 'index'])->name('products.index');
        Route::get('/products/create', [ProductoController::class, 'create'])->name('products.create');
        Route::post('/products/create', [ProductoController::class, 'store'])->name('products.store');
        Route::get('/products/edit/{id}', [ProductoController::class, 'edit'])->name('products.edit');
        Route::put('/products/{id}', [ProductoController::class, 'update'])->name('products.update');
        Route::delete('/products/{id}', [ProductoController::class, 'destroy'])->name('products.destroy');


        //productos
        Route::get('/users', [RegisterController::class, 'index'])->name('users.index');
        Route::get('/users/create', [RegisterController::class, 'createUser'])->name('users.create');
        Route::post('/users/create', [RegisterController::class, 'storeUser'])->name('users.store');
        Route::get('/users/edit/{id}', [RegisterController::class, 'edit'])->name('users.edit');
        Route::put('/users/{id}', [RegisterController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [RegisterController::class, 'destroy'])->name('users.destroy');
    });




    Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/login', [LoginController::class, 'create'])->name('login.index');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    Route::get('/phone', [SmsController::class, 'create'])->name('auth.phone');

    Route::post('/phone', [SmsController::class, 'store'])->name('auth.store');

    Route::get('/verification', [VeryfiController::class, 'create'])->name('auth.verification');
    Route::post('/verification', [VeryfiController::class, 'store'])->name('auth.storeve');

    Route::get('/application', [ApplicationController::class, 'create'])->name('app.verification');
    Route::post('/application', [ApplicationController::class, 'store'])->name('app.store');

});
