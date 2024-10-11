<?php

namespace App\Http\Controllers;

use Illuminate\View\view;
use Illuminate\Http\Request;

use App\Models\CategoryAdmin;
use App\Models\ContactAdmin;
use App\Models\SubscriberAdmin;

class AdminController extends Controller
{
    public function index_admin(): view
    {
        return view('admin.pages.index_admin');
    }
    public function login_admin(): view
    {
        return view('admin.pages.login_admin');
    }
}
