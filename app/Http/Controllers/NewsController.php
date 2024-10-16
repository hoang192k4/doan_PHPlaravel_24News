<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsAdmin;
use App\Models\AccountAdmin;
use App\Models\CategoryAdmin;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $news = $keyword ? NewsAdmin::search($keyword) : NewsAdmin::layAll();
        if ($news->isNotEmpty())
            return view('admin.pages.news_admin')->with("news", $news);
        else
            return view('admin.pages.news_admin')->with("news", $news)->with('message', "Không tìm thấy kết quả tìm kiếm nào");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $accounts = AccountAdmin::layAll();
        $categorys = CategoryAdmin::layAll();
        return view('admin.pages.news_admin.addnews_admin')->with('accounts', $accounts)->with('categorys', $categorys);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->input('title')&& $request->input('content')) {
            $viewData = [];
            $viewData['title'] = $request->input('title');
            $viewData['author'] = $request->input('author');
            $viewData['content'] = $request->input('content');
            if ($request->hasFile('image')) {
                $fileName = 'news_' . time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $fileName);
                $viewData['image'] = $fileName;
            } else {
                $viewData['image'] = 'image';
            }
            $viewData['category'] = $request->input('category');
            $result = NewsAdmin::store($viewData);
            if ($result) {
                return redirect('admin/news')->with("success", "Cập nhật thành công");
            }
        } else
            return redirect('admin/news')->with("error", "Cập không thành công");
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
        $categorys = CategoryAdmin::layAll();
        $news = NewsAdmin::editGetId($id);
        return view('admin.pages.news_admin.editnews_admin')->with('news', $news)
            ->with('accounts', $accounts)->with('categorys', $categorys);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->input('title') &&  $request->input('content')) {
            $viewData = [];
            $viewData['title'] = $request->input('title');
            $viewData['author'] = $request->input('author');
            $viewData['content'] = $request->input('content');
            $news = NewsAdmin::editGetId($id);
            if ($request->hasFile('image')) {
                // Xóa hình ảnh cũ nếu cần
                if (isset($news->image) && file_exists(public_path('images/' . $news->image))) {
                    unlink(public_path('images/' . $news->image));
                }

                // Lưu hình ảnh mới
                $fileName = 'news_' . time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $fileName);
                $viewData['image'] = $fileName; // Cập nhật tên hình ảnh mới vào viewData
            } else {
                // Nếu không có tệp mới, giữ lại tên tệp cũ
                $viewData['image'] = $news->image; // Giữ lại tên hình ảnh cũ
            }
            $viewData['category'] = $request->input('category');
            $result = NewsAdmin::updateId($id, $viewData);
            if ($result) {
                return redirect('admin/news')->with("success", "Cập nhật thành công");
            }
        } else
            return redirect('admin/news')->with("error", "Cập không thành công");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = NewsAdmin::deleteNews($id);
        if ($result) {
            return redirect('admin/news')->with("success", "Xóa thành công");
        } else
            return redirect('admin/news')->with("error", "Xóa không thành công");
    }
}
