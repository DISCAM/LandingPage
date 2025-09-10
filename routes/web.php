<?php

use App\Http\Controllers\LoftwareController;
use Illuminate\Support\Facades\Route;

Route::get('/', [loftwareController::class, 'index']);
