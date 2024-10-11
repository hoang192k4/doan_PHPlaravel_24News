<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SubscriberAdmin extends Model
{
    public static function layAll(){
        $subscriber =DB::table('subscriber')->where('status','=',1)->get();
        return $subscriber;
    }
    public static function deleteSubscriber($id){
           $deleted = DB::table('subscriber')->where('id',$id)->update(['status' => 0]);
        return $deleted;
    }
}
