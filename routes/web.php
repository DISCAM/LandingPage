<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\LoftwareController;


Route::redirect('/', '/dashboard');

Route::get('/dashboard', fn() => view('dashboard'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Wszystko niżej wymaga logowania
Route::middleware(['auth', 'verified'])->group(function () {
    // Profil
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Contacts
    Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/create', [ContactController::class, 'create'])->name('contacts.create');
    Route::post('contacts', [ContactController::class, 'store'])->name('contacts.store');

    //// stare podejście

    ///Route::get('contacts/edit/{id}', [ContactController::class, 'edit'])->whereNumber('id')->name('contacts.edit');
    ///Route::post('contacts/edit', [ContactController::class, 'editStore'])->name('contacts.editStore');
    ///Route::get('contacts/delete/{id}', [ContactController::class, 'delete'])->whereNumber('id')->name('contacts.delete');

    //// a podejście restowe

    //Edycja (formularz)

    Route::get('contacts/{contact}/edit', [ContactController::class, 'edit'])
        ->whereNumber('contact')
        ->name('contacts.edit');

    /// Zapis edycji

    Route::patch('contacts/{contact}', [ContactController::class, 'update'])
        ->whereNumber('contact')
        ->middleware('can:update,contact')
        ->name('contacts.update');

    /// Usuwanie

    Route::delete('contacts/{contact}', [ContactController::class, 'destroy'])
        ->whereNumber('contact')
        ->middleware('can:delete,contact')
        ->name('contacts.destroy');


    // Industry
    Route::get('industry', [IndustryController::class, 'index'])->name('industry.index');
    Route::get('industry/create', [IndustryController::class, 'create'])->name('industry.create');
    Route::post('industry', [IndustryController::class, 'store'])->name('industry.store');

    // Loftware – domyślna „strona po zalogowaniu”
    Route::prefix('loftware')->name('loftware.')->group(function () {
        Route::get('/', [LoftwareController::class, 'index'])->name('index');      // /loftware
        Route::get('create', [LoftwareController::class, 'create'])->name('create');
        Route::get('{id}', [LoftwareController::class, 'show'])->whereNumber('id')->name('show');
        Route::get('{id}/edit', [LoftwareController::class, 'edit'])->whereNumber('id')->name('edit');
    });
});

// Trasy Breeze (login/register/reset/verify)
require __DIR__ . '/auth.php';
