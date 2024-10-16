<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdvertisementAdmin extends Model
{
    public static function layAll()
    {
        $advertisenment = DB::table('advertisement')->join('account', 'advertisement.author', '=', 'account.id')
            ->join('category', 'advertisement.category', '=', 'category.id')
            ->select(
                'account.username',
                'advertisement.title',
                'advertisement.content',
                'advertisement.image',
                'advertisement.view',
                'advertisement.id',
                'advertisement.adddate',
                'category.category'
            )
            ->where('advertisement.status', 1)->where('category.status', 1)->where('account.status', 1)->orderByDesc('adddate')->paginate(2);
        return $advertisenment;
    }

    //Lấy thông kê số lượng bài viết quảng cáo
    public static function layAllShow()
    {
        $advertisenment = DB::table('advertisement')->join('account', 'advertisement.author', '=', 'account.id')
            ->join('category', 'advertisement.category', '=', 'category.id')
            ->select(
                'account.username',
                'advertisement.title',
                'advertisement.content',
                'advertisement.image',
                'advertisement.view',
                'advertisement.id',
                'advertisement.adddate',
                'category.category'
            )
            ->where('advertisement.status', 1)->where('category.status', 1)->where('account.status', 1)->orderByDesc('adddate')->get();
        return $advertisenment;
    }

    public static function store($viewData)
    {
        $result = DB::table('advertisement')->insert([
            'title' =>  $viewData['title'],
            'author' => $viewData['author'],
            'content' =>  $viewData['content'],
            'image' => $viewData['image'],
            'category' => $viewData['category']
        ]);
        return $result;
    }


    public static function deleteAd($id)
    {
        $delete = DB::table('advertisement')->where('id', '=', $id)->update(['status' => 0]);
        return $delete;
    }

    public static function editGetIdAd($id)
    {
        $news = DB::table('advertisement')->join('account', 'advertisement.author', '=', 'account.id')
            ->join('category', 'advertisement.category', '=', 'category.id')
            ->select(
                'account.username',
                'advertisement.title',
                'advertisement.content',
                'advertisement.image',
                'advertisement.view',
                'advertisement.id',
                'advertisement.adddate',
                'category.category',
                'advertisement.author',
                'advertisement.category'
            )
            ->where('advertisement.id', '=', $id)->first();
        return $news;
    }

    public static function updateIdAd($id, $viewData)
    {
        $result = DB::table('advertisement')->where('id', '=', $id)->update([
            'title' =>  $viewData['title'],
            'author' => $viewData['author'],
            'content' =>  $viewData['content'],
            'image' => $viewData['image'],
            'category' => $viewData['category']
        ]);
        return $result;
    }

    public static function searchAd($keyword)
    {
        return DB::table('advertisement')->join('account', 'advertisement.author', '=', 'account.id')
            ->join('category', 'advertisement.category', '=', 'category.id')
            ->select(
                'account.username',
                'advertisement.title',
                'advertisement.content',
                'advertisement.image',
                'advertisement.view',
                'advertisement.id',
                'advertisement.adddate',
                'category.category'
            )
            ->orderByDesc('adddate')->where('advertisement.status', 1)->where('category.status', 1)->where('account.status', 1)
            ->where(function ($query) use ($keyword) {
                $query->Where('advertisement.title', 'like', "%{$keyword}%")->orWhere('advertisement.content', 'like', "%{$keyword}%")
                    ->orWhere('account.username', 'like', "%{$keyword}%")->orWhere('category.category', 'like', "%{$keyword}%")
                    ->orWhere('advertisement.adddate', 'like', "%{$keyword}%")->orWhere('advertisement.view', 'like', "%{$keyword}%");
            })->paginate(2);
    }


    //user

    public static function layViewOne()
    {
        return DB::table('advertisement')->where('status', 1)->orderByDesc('view')->first();
    }
    public static function layViewAll()
    {
        return DB::table('advertisement')->where('status', 1)->orderBy('view')->limit(4)->get();
    }
    public static function layOne($id)
    {
        $view = DB::table('advertisement')->where('status', 1)->where('id', $id)->select('view')->first();
        $viewupdate = $view->view + 1;
        DB::table('advertisement')->where('status', 1)->where('id', $id)->update(['view' => $viewupdate]);
        /*  return DB::table('advertisement')->where('status',1); */
        $advertisenment = DB::table('advertisement')->join('account', 'advertisement.author', '=', 'account.id')
            ->join('category', 'advertisement.category', '=', 'category.id')
            ->select(
                'account.username',
                'advertisement.title',
                'advertisement.content',
                'advertisement.image',
                'advertisement.view',
                'advertisement.id',
                'advertisement.adddate',
                'category.category'
            )
            ->where('advertisement.id', $id)->first();
        return $advertisenment;
    }
}
