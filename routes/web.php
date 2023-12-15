<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\AdminPermissions;
use App\Livewire\AdminUser;
use App\Livewire\AdminRoles;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('can:admin_menu')->group(function () {

    Route::get('/adminuser', AdminUser::class)->middleware(['auth', 'verified'])->name('adminuser');
    Route::get('/adminroles', AdminRoles::class)->middleware(['auth', 'verified'])->name('adminroles');
    Route::get('/adminpermissions', AdminPermissions::class)->middleware(['auth', 'verified'])->name('adminpermissions');

});

