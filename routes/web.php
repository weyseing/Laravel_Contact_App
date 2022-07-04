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

// contact page by ID
Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');