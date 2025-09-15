<?php

use App\Http\Controllers\LoftwareController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoftwareController::class, 'index']);
Route::get('/{id}', [LoftwareController::class, 'show']);
