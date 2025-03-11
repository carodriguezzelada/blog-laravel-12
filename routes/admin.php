<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;


Route::get('/', function () {
    return 'admin.index';
})->name('index');
