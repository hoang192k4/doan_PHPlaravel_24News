<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


Route::controller(UserController::class)->group(function () {
        Route::get('/',"index")->name('index');
        Route::get('/contact',"contact")->name('contact');
        Route::get('/blog',"blog")->name('blog');
        Route::get('/single',"single")->name('single');
});

Route::controller(AdminController::class)->group(function () {
        Route::get('/admin',"index_admin")->name('index_admin');
        Route::get('/admin/news',"news_admin")->name('news_admin');
});