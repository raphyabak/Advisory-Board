<?php

use App\Http\Controllers\HomeController;
use App\Http\Livewire\Admin\Permissions;
use App\Http\Livewire\Admin\Roles;
use App\Http\Livewire\Admin\Users;
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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::group(['middleware' => ['role:Admin', 'auth']], function () {
    Route::get('admin', function () {
        return redirect('admin/users');
    });
    Route::get('admin/roles', Roles::class)->name('roles');
    Route::get('admin/permissions', Permissions::class)->name('permissions');
    Route::get('admin/users', Users::class)->name('users');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});

require __DIR__ . '/auth.php';
