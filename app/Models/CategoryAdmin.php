<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CategoryAdmin extends Model
{
    public static function layAll(){
        return DB::table('category')->where('status','=',1)->get();
    }

    public static function store($category){
        return DB::table('category')->insert(['category' => $category , 'status' => 1]);
    }

    public static function editGetID($id){
        return DB::table('category')->where('id',$id)->first();
    }

    public static function updateId($id,$category){
        return DB::table('category')->where('id',$id)->update(['category' => $category]);
    }

    public static function deleteCategory($id){
        return DB::table('category')->where('id',$id)->update(['status' => 0]);
    }
}
