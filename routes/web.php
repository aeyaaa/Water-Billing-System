<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonthController;
use App\Http\Controllers\RecordController;

Route::get('/', [MonthController::class, 'index'])->name('index');
Route::post('/months', [MonthController::class, 'store']);
Route::get('/months/{month}', [MonthController::class, 'show']);
Route::post('/records', [RecordController::class, 'store'])->name('records.store');
Route::get('/records/{record}/edit', [RecordController::class, 'edit'])->name('records.edit');
Route::put('/records/{record}', [RecordController::class, 'update'])->name('records.update');




//    Route::delete('/{payment}', 'destroy')->name('destroy');

   // Route::post('/new-month', [PaymentController::class, 'createNewMonth'])->name('new-month');
   // Route::get('/api/get-existing-data', [PaymentController::class, 'getExistingData']);


    // Route::get('/payment', [PaymentController::class, 'payment'])
//     ->name('water-billing-system.payment');

// Route::get('payment/create', [PaymentController::class, 'create'])
//     ->name('water-billing-system.create');

// Route::post('payment/store', [PaymentController::class, 'store'])
//     ->name('water-billing-system.store');

// Route::get('/payment/{payment}', [PaymentController::class, 'show'])
//     ->name('water-billing-system.show');

// Route::get('/payment/{payment}/edit', [PaymentController::class, 'edit'])
//     ->name('water-billing-system.edit');

// Route::patch('/payment/{payment}', [PaymentController::class, 'update'])
//     ->name('water-billing-system.update');

// Route::delete('/payment/{payment}', [PaymentController::class, 'destroy'])
//     ->name('water-billing-system.destroy');
