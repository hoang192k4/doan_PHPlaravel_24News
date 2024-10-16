<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\view;
use App\Models\SubscriberAdmin;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $subcribers = $keyword ? SubscriberAdmin::search($keyword) : SubscriberAdmin::layAll();
        if ($subcribers->isNotEmpty())
            return view('admin.pages.subscriber_admin')->with("subcribers", $subcribers);
        else
            return view('admin.pages.subscriber_admin')->with("subcribers", $subcribers)->with('message', "Không có kết quả tìm kiếm!");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()    
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->input('subscriber'))
        $result = SubscriberAdmin::create($request->input('subscriber'));
        return redirect()->route("index");
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = SubscriberAdmin::deleteSubscriber($id);
        if ($result) {
            return redirect('admin/subscriber')->with("success", "Xóa thành công");
        } else
            return redirect('admin/subscriber')->with("error", "Xóa không thành công");
    }
}
