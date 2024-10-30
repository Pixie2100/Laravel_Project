<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;

Route::get('/', function () {
    return view('welcome');
});

// Add a new route for the resume display
Route::get('/resume', [ResumeController::class, 'show'])->name('resume.show');
