<?php

use App\Http\Controllers\RoleController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'role'],function () {
        Route::get('', [RoleController::class, 'index'])->name('role.index');
        Route::get('/detail/{id}', [RoleController::class, 'show'])->name('role.detail');
        Route::post('/{id}', [RoleController::class, 'store'])->name('role.create');
    });

    // ...
    Route::group(['prefix' => 'department', 'middleware' => 'permission'], function () {
        Route::get('/', function () {
            $title = 'Department';
            return view('department', compact('title'));
        })->name('department.index');
        Route::get('/detail/{id}', function () {
            $title = 'Department detail';
            return view('department', compact('title'));
        })->name('department.detail');
        Route::get('/abv/{id}', function () {
            $title = 'Department detail';
            return view('department', compact('title'));
        });
    });

    Route::group(['prefix' => 'product', 'middleware' => 'permission'], function () {
        Route::get('/', function () {
            $title = 'Product';
            return view('product', compact('title'));
        })->name('product.index');
        Route::get('/detail', function () {
            $title = 'Product detail';
            return view('product', compact('title'));
        })->name('product.detail');
    });
});
