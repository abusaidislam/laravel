<?php

use App\Http\Controllers\Admin\admindashboardcontroller;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Customer\Customerdashboardcontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Sprovider\Sproviderdashboardcontroller;
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

// Route::get('/', function () {
//     return view('admin.admindashboard');
// });

Route::get('/', function () {
    return view('forntend.basefornt');
});

//customer
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified',])->group(function () {
    Route::get('/customer-dashboard', [Customerdashboardcontroller::class, 'Index'])->name('customer.dashboard');
});

//service Provider
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'authsprovider'])->group(function () {
    Route::get('/sprovider-dashboard', [Sproviderdashboardcontroller::class, 'Index'])->name('sprovider.dashboard');
});

//admin
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth', 'verified', 'authadmin'])->group(function () {
    Route::get('/admin-dashboard', [admindashboardcontroller::class, 'Index'])->name('admin.admindashboard');

    Route::prefix('admin/')->controller(CategoryController::class)->group(function () {
        Route::get('All-Category', 'Index')->name('allcategory');
        Route::get('Add-Category', 'AddCategory')->name('addcategory');
        Route::post('Store-Category', 'StoreCategory')->name('storecategory');
    });

    Route::prefix('admin/')->controller(ServicesController::class)->group(function () {
        Route::get('All-Services', 'Index')->name('allservices');
        Route::get('Add-Services', 'AddCategory')->name('addcategory');
        // Route::post('Store-Category', 'StoreCategory')->name('storecategory');
    });
});


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';