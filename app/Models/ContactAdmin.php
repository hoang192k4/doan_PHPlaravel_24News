<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ContactAdmin extends Model
{
    public static function layAll(){
        $contacts = DB::table('contact')->where('status','=','1')->orderByDesc('adddate')->paginate(7);
        return $contacts;
    }
    //Lấy thống kê số lượng Liên hệ
    public static function layAllShow(){
        $contacts = DB::table('contact')->where('status','=','1')->orderByDesc('adddate')->get();
        return $contacts;
    }
    public static function deleteContact($id){
        $delete = DB::table('contact')->where('id','=',$id)->update(['status' => 0]);
        return $delete;
    }
    public static function search($keyword){
        return DB::table('contact')->orderByDesc('adddate')->where('status',1)
        ->where(function($query) use ($keyword) {
            $query->where('username','like',"%{$keyword}%")
            ->orWhere('email','like',"%{$keyword}%")->orWhere('subject','like',"%{$keyword}%")
            ->orWhere('message','like',"%{$keyword}%")->orWhere('adddate','like',"%{$keyword}%");
        })->paginate(7);
    }

    public static function create($viewData){
        return DB::table('contact')->insert([
            'username' => $viewData['username'],
            'email' => $viewData['email'],
            'subject' => $viewData['subject'],
            'message' => $viewData['message']
        ]);
    }
}
