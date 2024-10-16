<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactAdmin;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $contacts = $keyword ? ContactAdmin::search($keyword) : ContactAdmin::layAll();
        if ($contacts->isNotEmpty())
            return view('admin.pages.contact_admin')->with("contacts", $contacts);
        else
            return view('admin.pages.contact_admin')->with("contacts", $contacts)->with('message', "Không tìm thấy kết quả tìm kiếm nào");
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
        if ($request->input('usernamecontact') && $request->input('emailcontact') && $request->input('subjectcontact') && $request->input('messagecontact')) {
            $viewData = [];
            $viewData['username'] = $request->input('usernamecontact');
            $viewData['email'] = $request->input('emailcontact');
            $viewData['subject'] = $request->input('subjectcontact');
            $viewData['message'] = $request->input('messagecontact');
            $result = ContactAdmin::create($viewData);
            if($result)
                return redirect()->route('contact');
        } 
        return redirect()->route('contact');
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
        $result = ContactAdmin::deleteContact($id);
        if ($result) {
            return redirect('admin/contact')->with("success", "Xóa thành công");
        } else
            return redirect('admin/contact')->with("error", "Xóa không thành công");
    }
}
