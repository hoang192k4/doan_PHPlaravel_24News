<?php

namespace App\Http\Controllers;
use Illuminate\View\view;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AdvertisementAdmin;
use App\Models\CategoryAdmin;
use App\Models\NewsAdmin;

class UserController extends Controller
{
    //trang chủ
    public function index():view{
        $advertisementone =  AdvertisementAdmin::layViewone();
        $advertisements = AdvertisementAdmin::layViewAll();
        $newsCreate_At4s = NewsAdmin::LayCreate_at4();
        $newsTrenddings = NewsAdmin::Lay4NewTrendding();
        $news = NewsAdmin::layAll();
        return view('user.pages.index_user')
        ->with('advertisementone',$advertisementone)
        ->with('news',$news)
        ->with('newsCreate_At4s',$newsCreate_At4s)
        ->with('advertisements',$advertisements)
        ->with('newsTrenddings',$newsTrenddings);
    }
    //Detail bài viết quảng cáo
    public function advertisement($id){
        $detail = AdvertisementAdmin::layOne($id);
        return view('user.pages.single_user')->with('detail',$detail);
    }
    //detail bài viết trang blog
    public function detail_blog($id){
        $detail = NewsAdmin::editGetIdUser($id);
        return view('user.pages.single_user')->with('detail',$detail);
    }
    //Trang blog
    public function blog(Request $request):view{
        $news = $request->input('keyword_user') ? NewsAdmin::search($request->input('keyword_user')) : NewsAdmin::layAll();
        if($news->isNotEmpty())
            return view('user.pages.blog_user')
            ->with('news',$news);
        else
        return view('user.pages.blog_user')
        ->with('news',$news)
        ->with('error',"Không có kết quả tìm kiếm");
    }
    //Lựa chọn bài viết theo chủ đề
    public function blog_category($id){
        $news = NewsAdmin::layAllCategory($id);
        return view('user.pages.blog_user')
        ->with('news',$news);
    }
    public function contact():view{
        return view('user.pages.contact_user');
    }
}