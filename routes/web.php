<?php

use Illuminate\Support\Facades\Route;
// Customer
use App\Http\Controllers\Frontend\Customer\Account\Auth\LoginController as CustomerAccountLoginController;
use App\Http\Controllers\Frontend\Customer\Account\DashboardController as CustomerAccountDashboardController;
use App\Http\Controllers\Frontend\Customer\Account\ProfileController as CustomerProfileController;
use App\Http\Controllers\Frontend\Customer\Account\OrderHistory\IndexController as CustomerOrderHistoryList;
use App\Http\Controllers\Frontend\Customer\Account\WishlistController as CustomerAccountWishlist;
use App\Http\Controllers\Frontend\Customer\Account\Address\IndexController as CustomerAccountAddress;
// Checkout
use App\Http\Controllers\Frontend\Checkout\Index\AccountController as CheckoutAccount;
use App\Http\Controllers\Frontend\Checkout\Index\IndexController as CheckoutIndex;
use App\Http\Controllers\Frontend\Checkout\Index\ShippingMethodsController  as CheckoutShippingMethods;
use App\Http\Controllers\Frontend\Checkout\Index\BillingMethodsController  as CheckoutBillingMethods;
// Dynamic
use App\Http\Controllers\Frontend\DynamicRouteController;
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
        Route::get('/profile', [CustomerProfileController::class, 'index'])->middleware(['auth:customer'])->name('profile');
        Route::get('/order-history', [CustomerOrderHistoryList::class, 'index'])->middleware(['auth:customer'])->name('order.history');
        Route::get('/wishlist', [CustomerAccountWishlist::class, 'index'])->middleware(['auth:customer'])->name('wishlist');
        Route::get('/address', [CustomerAccountAddress::class, 'index'])->middleware(['auth:customer'])->name('address.index');
        
    });
});



Route::prefix('checkout')->middleware(['auth:customer'])->name('checkout.')->group(function () {
    //account
    Route::get('/account', [CheckoutAccount::class, 'index'])->name('account');
    // index
    Route::get('/', [CheckoutIndex::class, 'index'])->name('index');
    Route::post('/shipping/methods', [CheckoutShippingMethods::class, 'getAvailableShippingMethods'])->name('shipping.methods');
    Route::post('/billing/methods', [CheckoutBillingMethods::class, 'getAvailableBillingMethods'])->name('billing.methods');
});





Route::prefix('category')->name('category.')->group(function () {
    //category products
    Route::get('/product/list/{id}', [DynamicRouteController::class, 'categoryProductsAjax'])->name('product.list');
});


//dynamic route

Route::get('/{any}', [DynamicRouteController::class, 'route'])->where('any', '.*');
