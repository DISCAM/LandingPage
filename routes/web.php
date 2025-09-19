<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\LoftwareController;
use Illuminate\Support\Facades\Route;


Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/industry', [IndustryController::class, 'index'])->name('industry.index');
Route::get('/create', [LoftwareController::class, 'create'])->name('create.create');
Route::get('/edit/{id}', [LoftwareController::class, 'edit'])->name('loftware.edit');
Route::get('/', [LoftwareController::class, 'index'])->name('loftware.index');
Route::get('/{id}', [LoftwareController::class, 'show'])->name('loftware.show');

Route::get('industry/create', [IndustryController::class, 'create'])->name('industry.create');
Route::post('industry', [IndustryController::class, 'store'])->name('industry.store');

Route::get('contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::get('contacts/delete/{id}', [ContactController::class, 'delete'])->name('contacts.delete');
Route::get('contacts/edit/{id}', [ContactController::class, 'edit'])->name('contacts.edit');
Route::post('contacts/edit/', [ContactController::class, 'editStore'])->name('contacts.editStore');
