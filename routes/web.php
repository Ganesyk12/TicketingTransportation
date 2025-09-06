<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return redirect('tiket');
});

Route::get('/sign', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/tiket', [HomeController::class, 'index'])->name('tiket');
Route::get('/addClass', [SetupController::class, 'addClass'])->name('setup.ticketclass');
Route::get('/addDestiny', [SetupController::class, 'addDestiny'])->name('setup.destiny');
Route::get('/tiket/{jenis}', [HomeController::class, 'buymenu'])->name('tiket.menu');

Route::get('/tiket/frm-tiketpesawat/{id}', [TransactionController::class, 'detailPesawat'])->name('detail.tiket.pesawat');
Route::get('/tiket/frm-tiketkereta/{id}', [TransactionController::class, 'detailKereta'])->name('detail.tiket.kereta');

Route::post('/store', [SetupController::class, 'store'])->name('setup.store');
Route::post('/storeDestiny', [SetupController::class, 'storeDestiny'])->name('setup.storedestiny');
Route::post('/storeTransaction', [TransactionController::class, 'addTransaction'])->name('addtransaction');
