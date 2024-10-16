<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SubscriberAdmin extends Model
{
    public static function layAll(){
        $subscriber =DB::table('subscriber')->where('status','=',1)->paginate(10);
        return $subscriber;
    }
    //Lấy só lượng thống kê cho lượt subscriber
    public static function layAllShow(){
        $subscriber =DB::table('subscriber')->where('status','=',1)->get();
        return $subscriber;
    }
    public static function deleteSubscriber($id){
           $deleted = DB::table('subscriber')->where('id',$id)->update(['status' => 0]);
        return $deleted;
    }
    public static function search($keyword){
        return DB::table('subscriber')->where('status',1)->where('email','like',"%{$keyword}%")->paginate(10);
    }
    public static function create($email){
        return DB::table('subscriber')->insert(['email' => $email]);
    }
}
