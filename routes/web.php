<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Auth::routes();


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::resource('roles', RoleController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('users', UserController::class);
    }
);

@include_once('admin_web.php');

Route::get('/', function () {
    return redirect()->route('index');
})->name('index');

Route::view('sample-page', 'admin.pages.sample-page')->name('sample-page');

Route::prefix('dashboard')->group(function () {
    Route::view('/', 'admin.dashboard.default')->name('index');
    Route::view('default', 'admin.dashboard.default')->name('dashboard.index');
});


// Route::resource('/categories', CategoryController::class);
// Route::resource('roles', RoleController::class)->except(['show']);


/** Start Route Roles **/

/** End Route Roles **/
Route::view('default-layout', 'multiple.default-layout')->name('default-layout');
Route::view('compact-layout', 'multiple.compact-layout')->name('compact-layout');
Route::view('modern-layout', 'multiple.modern-layout')->name('modern-layout');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
