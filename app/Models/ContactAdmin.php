<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ContactAdmin extends Model
{
    public static function layAll(){
        $contacts = DB::table('contact')->where('status','=','1')->get();
        return $contacts;
    }
    public static function deleteContact($id){
        $delete = DB::table('contact')->where('id','=',$id)->update(['status' => 0]);
        return $delete;
    }
}
