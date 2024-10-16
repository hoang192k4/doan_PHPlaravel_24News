<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AccountAdmin extends Model
{
    public static function layAll()
    {
        $accounts = DB::table('account')->where('status',1)->paginate(10);
        return $accounts;
    }
    public static function addAccount($username ,$pwd){
        $add = DB::table('account')->insert([
            'username' => $username,
            'password' => $pwd,
        ]);
        return $add;
    }
    public static function deleteAccount($id)
    {
        $delete = DB::table('account')->where('id', '=', $id)->update(['status' => 0]);
        return $delete;
    }

    public static function editGetAccount($id)
    {
        $account = DB::table('account')->where('id', '=', $id)->first();
        return $account;
    }

    public static function editAccount($id, $username, $password)
    {
        $edit = DB::table('account')->where('id', '=', $id)->update([
            'username' => $username,
            'password' => $password,
        ]);
        return $edit;
    }   

    public static function search($keyword){
        return DB::table('account')->where('status',1)
        ->where(function($query) use ($keyword) {
            $query->where('username','like',"%{$keyword}%")
            ->orwhere('password','like',"%{$keyword}%");
        })->paginate(10);       
    }
}
