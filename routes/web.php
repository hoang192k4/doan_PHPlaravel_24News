<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\AdvertisementController;

Route::controller(UserController::class)->group(function () {
        Route::get('/', "index")->name('index');
        Route::Get('advertisement/{id}',"advertisement")->name('advertisement');
        Route::get('/contact', "contact")->name('contact');
        Route::get('/blog', "blog")->name('blog');
        Route::get('/blog/{id}',"detail_blog")->name('detail_blog');
        Route::get('/blog_category/{id}',"blog_category")->name('blog_category');
});


//Admin
Route::resource('/admin/news', NewsController::class);

Route::resource('/admin/account', AccountController::class);

Route::resource('/admin/contact',ContactController::class);

Route::resource('/admin/subscriber', SubscriberController::class);

Route::resource('/admin/category',CategoryController::class);

Route::resource('/admin/advertisement',AdvertisementController::class);


Route::controller(AdminController::class)->group(function () {
        Route::get('/admin', "index_admin")->name('index_admin');
        Route::get('/admin/login', "login_admin");
});
