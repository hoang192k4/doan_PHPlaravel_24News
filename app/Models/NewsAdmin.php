<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class NewsAdmin extends Model
{
    public static function layAll()
    {
        $news = DB::table('news')->join('account', 'news.author', '=', 'account.id')
            ->join('category', 'news.category', '=', 'category.id')
            ->select(
                'account.username',
                'news.title',
                'news.content',
                'news.image',
                'news.view',
                'news.id',
                'news.adddate',
                'category.category'
            )
            ->where('news.status', 1)->where('category.status', 1)->where('account.status', 1)->orderByDesc('adddate')->paginate(3);
        return $news;
    }
    //Thống kê số lượng bài viết 
    public static function layAllShow()
    {
        $news = DB::table('news')->join('account', 'news.author', '=', 'account.id')
            ->join('category', 'news.category', '=', 'category.id')
            ->select(
                'account.username',
                'news.title',
                'news.content',
                'news.image',
                'news.view',
                'news.id',
                'news.adddate',
                'category.category'
            )
            ->where('news.status', 1)->where('category.status', 1)->where('account.status', 1)->orderByDesc('adddate')->get();
            return $news;
    }
    public static function layMostPopular($categoryId)
    {
        $news = DB::table('news')->join('account', 'news.author', '=', 'account.id')
            ->join('category', 'news.category', '=', 'category.id')
            ->select(
                'account.username',
                'news.title',
                'news.content',
                'news.image',
                'news.view',
                'news.id',
                'news.adddate',
                'category.category'
            )
            ->where('news.status', 1)->where('category.status', 1)->where('account.status', 1)->where('category.id', $categoryId)
            ->orderByDesc('view')->take(1)->get();
            return $news;
    }
    public static function store($viewData)
    {
        $result = DB::table('news')->insert([
            'title' =>  $viewData['title'],
            'author' => $viewData['author'],
            'content' =>  $viewData['content'],
            'image' => $viewData['image'],
            'category' => $viewData['category']
        ]);
        return $result;
    }
    public static function deleteNews($id)
    {
        $delete = DB::table('news')->where('id', '=', $id)->update(['status' => 0]);
        return $delete;
    }

    public static function editGetIdUser($id)
    {
        $view = DB::table('news')->find($id);
        $viewUpdate = $view->view + 1;
        DB::table('news')->where('id', $id)->update(['view' => $viewUpdate]);
        $news = DB::table('news')->join('account', 'news.author', '=', 'account.id')
            ->join('category', 'news.category', '=', 'category.id')
            ->select(
                'account.username',
                'news.title',
                'news.content',
                'news.image',
                'news.view',
                'news.id',
                'news.adddate',
                'category.category',
                'news.author',
                'news.category'
            )
            ->where('news.id', '=', $id)->first();
        return $news;
    }
    public static function editGetId($id)
    {
        $news = DB::table('news')->join('account', 'news.author', '=', 'account.id')
            ->join('category', 'news.category', '=', 'category.id')
            ->select(
                'account.username',
                'news.title',
                'news.content',
                'news.image',
                'news.view',
                'news.id',
                'news.adddate',
                'category.category',
                'news.author',
                'news.category'
            )
            ->where('news.id', '=', $id)->first();
        return $news;
    }

    public static function updateId($id, $viewData)
    {
        $result = DB::table('news')->where('id', '=', $id)->update([
            'title' =>  $viewData['title'],
            'author' => $viewData['author'],
            'content' =>  $viewData['content'],
            'image' => $viewData['image'],
            'category' => $viewData['category']
        ]);
        return $result;
    }
    public static function search($keyword)
    {
        return DB::table('news')->join('account', 'news.author', '=', 'account.id')
            ->join('category', 'news.category', '=', 'category.id')
            ->select(
                'account.username',
                'news.title',
                'news.content',
                'news.image',
                'news.view',
                'news.id',
                'news.adddate',
                'category.category'
            )
            ->orderByDesc('adddate')->where('news.status', 1)->where('category.status', 1)->where('account.status', 1)
            ->where(function ($query) use ($keyword) {
                $query->Where('news.title', 'like', "%{$keyword}%")->orWhere('news.content', 'like', "%{$keyword}%")
                    ->orWhere('account.username', 'like', "%{$keyword}%")->orWhere('category.category', 'like', "%{$keyword}%")
                    ->orWhere('news.adddate', 'like', "%{$keyword}%")->orWhere('news.view', 'like', "%{$keyword}%");
            })->paginate(3);
    }

    public static function layAllCategory($id)
    {
        $news = DB::table('news')->join('account', 'news.author', '=', 'account.id')
            ->join('category', 'news.category', '=', 'category.id')
            ->select(
                'account.username',
                'news.title',
                'news.content',
                'news.image',
                'news.view',
                'news.id',
                'news.adddate',
                'category.category'
            )
            ->where('news.status', 1)->where('category.status', 1)->where('account.status', 1)->where('category.id', $id)->orderByDesc('adddate')->paginate(3);
        return $news;
    }

    //Lấy 4 bài viết có lượt view cao nhất
    public static function Lay4NewTrendding()
    {
        $news = DB::table('news')->join('account', 'news.author', '=', 'account.id')
            ->join('category', 'news.category', '=', 'category.id')
            ->select(
                'account.username',
                'news.title',
                'news.content',
                'news.image',
                'news.view',
                'news.id',
                'news.adddate',
                'category.category'
            )
            ->where('news.status', 1)->where('category.status', 1)->where('account.status', 1)->orderByDesc('news.view')->take(4)->get();
        return $news;
    }
    //Lấy 4 bài viết mới nhất
    public static function LayCreate_at4()
    {
        $news = DB::table('news')->join('account', 'news.author', '=', 'account.id')
            ->join('category', 'news.category', '=', 'category.id')
            ->select(
                'account.username',
                'news.title',
                'news.content',
                'news.image',
                'news.view',
                'news.id',
                'news.adddate',
                'category.category'
            )
            ->where('news.status', 1)->where('category.status', 1)->where('account.status', 1)->orderByDesc('adddate')->take(4)->get();
        return $news;
    }
}
