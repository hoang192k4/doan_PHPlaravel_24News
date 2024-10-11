<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
            ->where('news.status', 1)->where('category.status', 1)->get();
        return $news;
    }

    public static function store($viewData){
        $result = DB::table('news')->insert([
            'title' =>  $viewData['title'],
            'author' => $viewData['author'],
            'content' =>  $viewData['content'],
            'image' => $viewData['image'],
            'view' => $viewData['view'],
            'status' => $viewData['status'],
            'category' => $viewData['category']
        ]);
        return $result;
    }
    public static function deleteNews($id)
    {
        $delete = DB::table('news')->where('id', '=', $id)->update(['status' => 0]);
        return $delete;
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
        $result = DB::table('news')->where('id','=', $id)->update([
            'title' =>  $viewData['title'],
            'author' => $viewData['author'],
            'content' =>  $viewData['content'],
            'image' => $viewData['image'],
            'view' => $viewData['view'],
            'status' => $viewData['status'],
            'category' => $viewData['category']
        ]);
        return $result;
    }
}
