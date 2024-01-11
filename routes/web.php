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

Route::get('/role', [RoleController::class, 'index'])->name('role.index');
Route::get('/role/detail/{id}', [RoleController::class, 'show'])->name('role.detail');
Route::post('/role/{id}', [RoleController::class, 'store'])->name('role.create');


Route::group(['prefix' => 'department', 'middleware' => 'permission'],function () {
    Route::get('/', function () {
        $title = 'Department';
        return view('view-demo', compact('title'));
    })->name('department.index');
    Route::get('/detail', function () {
        $title = 'Department detail';
        return view('view-demo', compact('title'));
    })->name('department.detail');
});

Route::prefix('product')->group(function () {
    Route::get('/', function () {
        $title = 'Product';
        return view('view-demo', compact('title'));
    })->name('product.index');
    Route::get('/detail', function () {
        $title = 'Product detail';
        return view('view-demo', compact('title'));
    })->name('product.detail');
});
