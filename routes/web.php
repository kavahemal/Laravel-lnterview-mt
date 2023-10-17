<?php

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

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);
Auth::routes(['reset' => false]);

Route::middleware(['auth'])->group(function () {
    Route::get('userDashboard', [App\Http\Controllers\UserDashboard::class, 'index']);
    Route::get('userDashboard/{id}', [App\Http\Controllers\UserDashboard::class, 'index']);
    Route::group(['middleware' => ['admin']], function () {
        Route::get('adminDashboard', [App\Http\Controllers\AdminDashboard::class, 'index']);
        Route::resource('categories', App\Http\Controllers\CategoriesController::class);
    });
});
