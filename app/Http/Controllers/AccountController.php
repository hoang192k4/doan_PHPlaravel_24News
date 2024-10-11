<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountAdmin;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = AccountAdmin::layAll();
        return view('admin.pages.account_admin')->with("accounts", $accounts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $username = $request->input('username');
        $pwd = $request->input('password');
        $result = AccountAdmin::addAccount($username,$pwd);
        if ($result){
            return redirect('admin/account')->with("success", "Thêm account thành công");
        }
        else
            return redirect('admin/account')->with("error", "Thêm account không thành công");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $accounts = AccountAdmin::layAll();
        $account = AccountAdmin::editGetAccount($id);
        return view('admin.pages.account_admin')->with('accounts',$accounts)->with('account', $account);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $username = $request->input('username');
        $pwd = $request->input('password');
        $result = AccountAdmin::editAccount($id,$username,$pwd);
        if ($result){
            return redirect('admin/account')->with("success", "Cập nhật thành công");
        }
        else
            return redirect('admin/account')->with("error", "Cập nhật không thành công");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = AccountAdmin::deleteAccount($id);
        if ($result){
            return redirect('admin/account')->with("success", "Xóa thành công");
        }
        else
            return redirect('admin/account')->with("error", "Xóa không thành công");
    }
}
