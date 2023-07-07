<?php

use App\Http\Controllers\EventoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubEventoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
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

    Route::controller(EventoController::class)->group(function(){

        Route::name('eventos.')->group(function (){

            Route::get('/eventos','index')->name('index');

            Route::get('/eventos/create','create')->name('create');
            Route::post('/eventos/','store')->name('store');

            Route::get('/eventos/edit/{evento}','edit')
                   ->name('edit')
                   ->missing(function () {
                       return Redirect::route('eventos.index');
                   });
            Route::post('/eventos/update/{evento}','update')->name('update');

            Route::delete('/eventos/destroy/{evento}','destroy')->name('destroy');

            Route::get('/eventos/delete-images/{evento}','deleteImages')
                   ->name('deleteImages')
                   ->middleware('images')
                   ->missing(function () {
                       return Redirect::route('eventos.index');
                   });
            Route::post('/eventos/{evento}/destroy-images','destroyImages')->name('destroyImages');


        });

    });

    Route::controller(SubEventoController::class)->group(function (){

        Route::name('subeventos.')->group(function (){

            Route::get('/subevento/delete/{evento}','delete')
                   ->name('delete')
                   ->missing(function () {
                       return Redirect::route('eventos.index');
                   });
            Route::delete('/subevento/destroy/{subEvento}','destroy')->name('destroy');

        });

    });


});

require __DIR__.'/auth.php';
