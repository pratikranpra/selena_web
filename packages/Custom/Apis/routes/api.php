<?php

use Illuminate\Support\Facades\Route;
use Custom\Apis\Http\Controllers\ApisController;

Route::get('/apis', [ApisController::class, 'index']);
