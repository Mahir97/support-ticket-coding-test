<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
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



Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [TicketController::class, 'dash'])->name('dashboard');
    Route::get('/ticket', [TicketController::class, 'ticket'])->name('auth.ticket');
    Route::get('/{ticket}/ticket', [TicketController::class, 'replyticket'])->name('auth.reply');
    Route::post('/{ticket}/ticket', [TicketController::class, 'adressticket'])->name('auth.address');
    Route::post('/ticket', [TicketController::class, 'ticket_entry'])->name('auth.entry');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
