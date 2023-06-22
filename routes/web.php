<?php

use App\Http\Controllers\EventoController;
use App\Http\Controllers\ProfileController;
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

            Route::get('/eventos/edit/{evento}','edit')->name('edit');
            Route::post('/eventos/update/{evento}','update')->name('update');

            //Route::delete('/eventos/destroy/{id}','destroy')->name('destroy');
            Route::delete('/eventos/destroy/{evento}','destroy')->name('destroy');

        });

    });


});
//Incluir al middleware
/*
Route::controller(EventoController::class)->group(function(){

    Route::name('eventos.')->group(function (){

        Route::get('/eventos','index')->name('index');

        Route::get('/eventos/create','create')->name('create');
        Route::post('/eventos/','store')->name('store');

    });

});
*/

require __DIR__.'/auth.php';
