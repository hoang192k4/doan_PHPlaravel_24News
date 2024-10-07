<?php

namespace App\Http\Controllers;
use Illuminate\View\view;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function index():view{
        return view('user.pages.index_user');
    }
    public function contact():view{
        return view('user.pages.contact_user');
    }
    public function blog():view{
        return view('user.pages.blog_user');
    }
    public function single():view{
        return view('user.pages.single_user');
    }
}
