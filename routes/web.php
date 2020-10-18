<?php

use Illuminate\Support\Facades\Route;
//customer
use App\Http\Controllers\Frontend\Customer\LoginController as CustomerLoginController;
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
    return view('frontend.welcome');
})->name('welcome');



Route::prefix('customer')->name('customer.')->group(function () {
    Route::get('/login', [CustomerLoginController::class, 'create'])->middleware(['guest:customer'])->name('login');
    Route::post('/authenticate', [CustomerLoginController::class, 'login'])->middleware(['guest:customer'])->name('authenticate');
    Route::get('/logout', [CustomerLoginController::class, 'logout'])->middleware(['auth:customer'])->name('logout');
});
