<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AccountAdmin extends Model
{
    public static function layAll()
    {
        $accounts = DB::select('select * from account where status = ?', [1]);
        return $accounts;
    }
    public static function addAccount($username ,$pwd){
        $add = DB::table('account')->insert([
            'username' => $username,
            'password' => $pwd,
            'status' => 1
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
            'status' => 1
        ]);
        return $edit;
    }
}
