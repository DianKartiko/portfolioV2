<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/resume', [PageController::class, 'resume'])->name('resume');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/blogs', [PageController::class, 'blogs'])->name('blogs');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
