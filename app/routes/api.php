<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::resource('movies', MovieController::class);
});