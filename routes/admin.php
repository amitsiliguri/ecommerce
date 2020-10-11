<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
// catalog

// catalog category
use App\Http\Controllers\Admin\Catalog\Category\CreateController as CatalogCategoryCreate;
use App\Http\Controllers\Admin\Catalog\Category\StoreController as CatalogCategoryStore;
use App\Http\Controllers\Admin\Catalog\Category\EditController as CatalogCategoryEdit;
use App\Http\Controllers\Admin\Catalog\Category\TreeController as CatalogCategoryTree;
use App\Http\Controllers\Admin\Catalog\Category\ReorderController as CatalogCategoryTreeReorder;
use App\Http\Controllers\Admin\Catalog\Category\UpdateController as CatalogCategoryUpdate;
// catalog Product
use App\Http\Controllers\Admin\Catalog\Product\IndexController as CatalogProductIndex;
use App\Http\Controllers\Admin\Catalog\Product\CreateController as CatalogProductCreate;
// catalog Product Attribute
// catalog Product Attribute Set
use App\Http\Controllers\Admin\Catalog\Product\AttributeSet\IndexController as CatalogProductAttributeSetIndex;
// catalog inventory
use App\Http\Controllers\Admin\Catalog\Inventory\Source\IndexController as CatalogInventorySourceIndex;



use Laravel\Fortify\Features;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\ConfirmablePasswordController;
use Laravel\Fortify\Http\Controllers\ConfirmedPasswordStatusController;
use Laravel\Fortify\Http\Controllers\EmailVerificationNotificationController;
use Laravel\Fortify\Http\Controllers\EmailVerificationPromptController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Laravel\Fortify\Http\Controllers\PasswordController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
use Laravel\Fortify\Http\Controllers\ProfileInformationController;
use Laravel\Fortify\Http\Controllers\RecoveryCodeController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticationController;
use Laravel\Fortify\Http\Controllers\TwoFactorQrCodeController;
use Laravel\Fortify\Http\Controllers\VerifyEmailController;

use Laravel\Jetstream\Jetstream;
use Laravel\Jetstream\Http\Controllers\CurrentTeamController;
use Laravel\Jetstream\Http\Controllers\Inertia\ApiTokenController;
use Laravel\Jetstream\Http\Controllers\Inertia\CurrentUserController;
use Laravel\Jetstream\Http\Controllers\Inertia\OtherBrowserSessionsController;
use Laravel\Jetstream\Http\Controllers\Inertia\ProfilePhotoController;
use Laravel\Jetstream\Http\Controllers\Inertia\TeamController;
use Laravel\Jetstream\Http\Controllers\Inertia\TeamMemberController;
use Laravel\Jetstream\Http\Controllers\Inertia\UserProfileController;



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


// not authenticated
Route::group(['middleware' => config('fortify.middleware', ['guest:web'])], function () {
    // Authentication...
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->middleware(['guest'])->name('login');
    $limiter = config('fortify.limiters.login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware(array_filter(['guest',$limiter ? 'throttle:'.$limiter : null,]));
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    // Password Reset...
    if (Features::enabled(Features::resetPasswords())) {
        Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->middleware(['guest'])->name('password.request');
        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->middleware(['guest'])->name('password.email');
        Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->middleware(['guest'])->name('password.reset');
        Route::post('/reset-password', [NewPasswordController::class, 'store'])->middleware(['guest'])->name('password.update');
    }
    // Registration...
    if (Features::enabled(Features::registration())) {
        Route::get('/register', [RegisteredUserController::class, 'create'])->middleware(['guest'])->name('register');
        Route::post('/register', [RegisteredUserController::class, 'store'])->middleware(['guest']);
    }
    // Email Verification...
    if (Features::enabled(Features::emailVerification())) {
        Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke'])->middleware(['auth'])->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['auth', 'signed', 'throttle:6,1'])->name('verification.verify');
        Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
    }
    // Profile Information...
    if (Features::enabled(Features::updateProfileInformation())) {
        Route::put('/user/profile-information', [ProfileInformationController::class, 'update'])->middleware(['auth']);
    }
    // Passwords...
    if (Features::enabled(Features::updatePasswords())) {
        Route::put('/user/password', [PasswordController::class, 'update'])->middleware(['auth']);
    }
    // Password Confirmation...
    Route::get('/user/confirm-password', [ConfirmablePasswordController::class, 'show'])->middleware(['auth'])->name('password.confirm');
    Route::post('/user/confirm-password', [ConfirmablePasswordController::class, 'store'])->middleware(['auth']);
    Route::get('/user/confirmed-password-status', [ConfirmedPasswordStatusController::class, 'show'])->middleware(['auth'])->name('password.confirmation');
    // Two Factor Authentication...
    if (Features::enabled(Features::twoFactorAuthentication())) {
        Route::get('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'create'])->middleware(['guest'])->name('two-factor.login');
        Route::post('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'store'])->middleware(['guest']);
        $twoFactorMiddleware = Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword') ? ['auth', 'password.confirm'] : ['auth'];
        Route::post('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'store'])->middleware($twoFactorMiddleware);
        Route::delete('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'destroy'])->middleware($twoFactorMiddleware);
        Route::get('/user/two-factor-qr-code', [TwoFactorQrCodeController::class, 'show'])->middleware($twoFactorMiddleware);
        Route::get('/user/two-factor-recovery-codes', [RecoveryCodeController::class, 'index'])->middleware($twoFactorMiddleware);
        Route::post('/user/two-factor-recovery-codes', [RecoveryCodeController::class, 'store'])->middleware($twoFactorMiddleware);
    }
});




// Authenticated
Route::group(['middleware' => ['auth:web', 'verified']], function () {
    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');

    //Catalog
    Route::prefix('catalog')->name('catalog.')->group(function () {
      //Category
      Route::prefix('category')->name('category.')->group(function () {
        Route::get('/create', [CatalogCategoryCreate::class, 'create'])->name('create');
        Route::prefix('tree')->name('tree.')->group(function () {
          Route::get('/', [CatalogCategoryTree::class, 'tree'])->name('index');
          Route::post('/reorder', [CatalogCategoryTreeReorder::class, 'reorder'])->name('reorder');
        });
        Route::post('/store', [CatalogCategoryStore::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CatalogCategoryEdit::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [CatalogCategoryUpdate::class, 'update'])->name('update');
      });
      //Products
      Route::prefix('product')->name('product.')->group(function () {
        Route::get('/', [CatalogProductIndex::class, 'index'])->name('index');
        Route::get('/create', [CatalogProductCreate::class, 'create'])->name('create');
        Route::get('/paginated/data', [CatalogProductIndex::class, 'paginatedProductData'])->name('paginated.data');
        //attribute
        Route::prefix('attribute')->name('attribute.')->group(function () {
          //set
          Route::prefix('set')->name('set.')->group(function () {
            Route::get('/', [CatalogProductAttributeSetIndex::class, 'index'])->name('index');

          });
        });
      });
      //Inventory
      Route::prefix('inventory')->name('inventory.')->group(function () {
        Route::get('/list', [CatalogInventorySourceIndex::class, 'getAllInventorySourceList'])->name('list');
      });
    });
});
