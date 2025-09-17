<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\LoftwareController;
use Illuminate\Support\Facades\Route;


Route::get('/contacts', [ContactController::class, 'index']);
Route::get('/industry', [IndustryController::class, 'index']);
Route::get('/create', [LoftwareController::class, 'create']);
Route::get('/edit/{id}', [LoftwareController::class, 'edit']);
Route::get('/', [LoftwareController::class, 'index']);
Route::get('/{id}', [LoftwareController::class, 'show']);

