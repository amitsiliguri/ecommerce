<?php

use Illuminate\Support\Facades\Route;
//customer
use App\Http\Controllers\Frontend\Customer\Account\Auth\LoginController as CustomerAccountLoginController;
use App\Http\Controllers\Frontend\Customer\Account\DashboardController as CustomerAccountDashboardController;
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
    //account
    Route::prefix('account')->name('account.')->group(function () {
        //authentication route start
        Route::get('/login', [CustomerAccountLoginController::class, 'create'])->middleware(['guest:customer'])->name('login');
        Route::post('/authenticate', [CustomerAccountLoginController::class, 'login'])->middleware(['guest:customer'])->name('authenticate');
        Route::get('/logout', [CustomerAccountLoginController::class, 'logout'])->middleware(['auth:customer'])->name('logout');
        //authentication route end
        Route::get('/dashboard', [CustomerAccountDashboardController::class, 'index'])->middleware(['auth:customer'])->name('dashboard');
    });

});



