<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\Admin\CategoryController;

Route::resource('categories', CategoryController::class);
