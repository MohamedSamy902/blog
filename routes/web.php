<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();
@include_once('admin_web.php');

Route::get('/', function () {
    return redirect()->route('index');
})->name('/');

Route::view('sample-page', 'admin.pages.sample-page')->name('sample-page');

Route::prefix('dashboard')->group(function () {
    Route::view('/', 'admin.dashboard.default')->name('index');
    Route::view('default', 'admin.dashboard.default')->name('dashboard.index');
});


Route::prefix('categories')->group(function () {
    Route::resource('/', CategoryController::class);
    // Route::view('/', 'admin.dashboard.default')->name('index');
    // Route::view('default', 'admin.dashboard.default')->name('dashboard.index');
});

// Route::prefix('roles')->group(function () {
    // Route::resource('/', RoleController::class);
    Route::resource('roles', RoleController::class)->except(['show']);
// });


/** Start Route Roles **/

/** End Route Roles **/
Route::view('default-layout', 'multiple.default-layout')->name('default-layout');
Route::view('compact-layout', 'multiple.compact-layout')->name('compact-layout');
Route::view('modern-layout', 'multiple.modern-layout')->name('modern-layout');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
