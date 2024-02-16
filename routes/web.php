<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;

use App\Http\Controllers\PaymentController;

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

Route::get('/', [LoginController::class, 'create'])->name('register');
Route::post('/', [LoginController::class, 'login'])->name('loginAuth');
Route::get('/logout', [LogoutController::class, 'logout'])->name('register');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('registerPost');

Route::get('/products', function () {
    return view('products');
});

Route::get('/buy/{id}/{price}', [PaymentController::class, 'charge'])->name('goToPayment');
Route::post('buy/process-payment/{string}/{price}', [PaymentController::class, 'processPayment'])->name('processPayment');
