<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\PlaylistController;
use App\Http\Controllers\PlaylistTrackController;
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
    return view('welcome');
})->middleware(['auth'])->name('welcome');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/admin/users', UserController::class);
});

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('admin')->group(function () {
        Route::resource(
            'users',
            App\Http\Controllers\Admin\UserController::class
        );
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('genres',  GenreController::class);
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource(
    'tracks',
    App\Http\Controllers\Admin\TrackController::class);
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource(
        'playlists',
        App\Http\Controllers\Admin\PlaylistController::class
    );
});


Route::get('/dashboard', function () {
    return view('welcome');
//})->middleware(['auth'])->name('dashboard');
})->middleware(['auth'])->name('welcome');



require __DIR__.'/auth.php';
