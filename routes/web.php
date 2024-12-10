<?php

use App\Http\Controllers\ProductsController;
use App\Models\Role;
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
})->middleware(['auth'])->name('dashboard');

Route::prefix('productos')->middleware(['auth', 'role:' . Role::CUSTOMER])->controller(ProductsController::class)->name('products.')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('crear', 'create')->name('create');
    Route::post('crear', 'store')->name('store');
    Route::get('editar/{id}', 'edit')->name('edit');
    Route::post('editar/{id}', 'update')->name('update');
    Route::post('eliminar/{id}', 'delete')->name('delete');
});


require __DIR__.'/auth.php';
