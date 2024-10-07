<?php

namespace App\Http\Controllers;
use Illuminate\View\view;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index_admin():view{
        return view('admin.pages.index_admin');
    }
    public function news_admin():view{
        return view('admin.pages.news_admin');
    }
}
