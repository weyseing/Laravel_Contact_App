<?php

use Illuminate\Support\Facades\Route;

// =============================
// import
// =============================
use App\Http\Controllers\ContactController;             //controller namespace

// welcome
Route::get('/', function () {
    return view('welcome');
});

// contacts
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

// create contacts
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');

// store contacts
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

// display contact page by ID
Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');

// edit contact page by ID
Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit');

// update contact by ID
Route::put('/contacts/{id}', [ContactController::class, 'update'])->name('contacts.update');

// delete contact by ID
Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');