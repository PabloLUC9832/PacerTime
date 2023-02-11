<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

#https://laravel.com/docs/9.x/routing#route-groups
Route::controller(EventoController::class)->group( function (){

    #https://laravel.com/docs/9.x/routing#named-routes
    #https://laravel.com/docs/9.x/routing#route-group-controllers
    Route::name('evento.')->group( function (){

        Route::get('/evento','index')->name('index');

        Route::get('/evento/create','create')->name('create');
        Route::post('/evento','store')->name('store');

        Route::get('/evento/edit/{id}','edit')->name('edit');
        Route::post('/evento/update/{id}','update')->name('update');

        Route::delete('/evento/destroy/{id}','destroy')->name('destroy');

    });


});

