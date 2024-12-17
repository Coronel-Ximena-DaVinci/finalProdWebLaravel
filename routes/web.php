<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\HomeController;
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
Route::prefix('')->controller(HomeController::class)->group(function () {
    Route::get('', 'index')->name('home.index');
});

Route::prefix('')->name('catalogo.')->controller(CatalogoController::class)->group(function () {
    Route::get('catalogo', 'index')->name('index');
    Route::get('buscar', 'search')->name('search');
    Route::get('mostrar/{id}', 'show')->name('show');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:' . Role::CUSTOMER])->group(function () {

    Route::prefix('productos')->controller(ProductsController::class)->name('products.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('crear', 'create')->name('create');
        Route::post('crear', 'store')->name('store');
        Route::get('editar/{id}', 'edit')->name('edit');
        Route::post('editar/{id}', 'update')->name('update');
        Route::post('eliminar/{id}', 'delete')->name('delete');
    });
    Route::prefix('categorias')->controller(CategoriesController::class)->name('categories.')->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('crear', 'create')->name('create');
        Route::post('crear', 'store')->name('store');
        Route::get('editar/{id}', 'edit')->name('edit');
        Route::post('editar/{id}', 'update')->name('update');
        Route::post('eliminar/{id}', 'delete')->name('delete');
    });
});
require __DIR__.'/auth.php';
