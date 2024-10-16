<?php

namespace App\Http\Controllers;

use Illuminate\View\view;
use Illuminate\Http\Request;

use App\Models\CategoryAdmin;
use App\Models\ContactAdmin;
use App\Models\SubscriberAdmin;
use App\Models\NewsAdmin;
use App\Models\AdvertisementAdmin;

class AdminController extends Controller
{
    public function index_admin(): view
    {
        $news = NewsAdmin::layAllShow();
        $contact = ContactAdmin::layAllShow();
        $Subscriber = SubscriberAdmin::layAllShow();
        $advertisement = AdvertisementAdmin::layAllShow();
        return view('admin.pages.index_admin')
        ->with('countNews',count($news))
        ->with('countContact',count($contact))
        ->with('countSubscriber',count($Subscriber))
        ->with('countAdvertisement',count($advertisement));
    }
    public function login_admin(): view
    {
        return view('admin.pages.login_admin');
    }
}
