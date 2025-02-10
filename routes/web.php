<?php

use App\Http\Controllers\LoginSiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/login', action: [LoginSiswaController::class, 'login']);;
