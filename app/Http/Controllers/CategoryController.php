<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryAdmin;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $categorys = $keyword ? CategoryAdmin::search($keyword) : CategoryAdmin::layAll();
        if ($categorys->isNotEmpty())
            return view('admin.pages.category_admin')->with("categorys", $categorys);
        else
            return view('admin.pages.category_admin')->with("categorys", $categorys)->with('message', "Không tìm thấy kết quả tìm kiếm");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = $request->input('category');
        $result = CategoryAdmin::store($category);
        if ($result) {
            return redirect('admin/category')->with("success", "Thêm mới thành công");
        } else
            return redirect('admin/category')->with("error", "Thêm mới không thành công");
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
        $categorys = CategoryAdmin::layAll();
        $category = CategoryAdmin::editGetID($id);
        return view('admin.pages.category_admin')->with('category', $category)->with("categorys", $categorys);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = $request->input('category');
        $result = CategoryAdmin::updateId($id, $category);
        if ($result) {
            return redirect('admin/category')->with("success", "Cập nhật thành công");
        } else
            return redirect('admin/category')->with("error", "Cập nhật không thành công");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = CategoryAdmin::deleteCategory($id);
        if ($result) {
            return redirect('admin/category')->with("success", "Xóa thành công");
        } else
            return redirect('admin/category')->with("error", "Xóa không thành công");
    }
}
