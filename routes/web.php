<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Client;
use App\Models\User;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'clients' => Client::all(),
        'users' => User::all()
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Users
    Route::get('/users-index', [UserController::class, 'index'])->name('user.index');
    Route::get('/users-edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    //->middleware('can:level');

    Route::put('/edit-update/{id}', [UserController::class, 'update'])->name('user.update');

    //Clients
    Route::resources([
        'client' => ClientController::class
    ]);

    //Meus clients
    Route::get('/clients-my/{id}', [ClientController::class, 'myClients'])->name('client.my');
    Route::get('/delete-confirm/{id}', [ClientController::class, 'deleteConfirm'])->name('delete.confirm');
});

require __DIR__.'/auth.php';
