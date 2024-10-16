<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdvertisementAdmin;
use App\Models\AccountAdmin;
use App\Models\CategoryAdmin;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $advertisements = $keyword ? AdvertisementAdmin::searchAd($keyword) : AdvertisementAdmin::layAll();
        if ($advertisements->isNotEmpty())
        return view('admin.pages.advertisement_admin')->with('advertisements', $advertisements);
        else
        return view('admin.pages.advertisement_admin')->with("advertisements", $advertisements)->with('message', "Không tìm thấy kết quả tìm kiếm nào");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $accounts = AccountAdmin::layAll();
        $categorys = CategoryAdmin::layAll();
        return view('admin.pages.advertisement_admin.addadvertisement_admin')->with('accounts', $accounts)->with('categorys', $categorys);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->input('title') && $request->input('content')) {
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
            $result = AdvertisementAdmin::store($viewData);
            if ($result) {
                return redirect('admin/advertisement')->with("success", "Cập nhật thành công");
            }
        } else
            return redirect('admin/advertisement')->with("error", "Cập không thành công");
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
        $advertisement = AdvertisementAdmin::editGetIdAd($id);
        return view('admin.pages.advertisement_admin.editadvertisement_admin')->with('advertisement', $advertisement)
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
            $advertisement = AdvertisementAdmin::editGetIdAd($id);
            if ($request->hasFile('image')) {
                $fileName = 'news_' . time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $fileName);
                $viewData['image'] = $fileName; // Cập nhật tên hình ảnh mới vào viewData
            } else {
                // Nếu không có tệp mới, giữ lại tên tệp cũ
                $viewData['image'] = $advertisement->image; // Giữ lại tên hình ảnh cũ
            }
            $viewData['category'] = $request->input('category');
            $result = AdvertisementAdmin::updateIdAd($id, $viewData);
            if ($result) {
                return redirect('admin/advertisement')->with("success", "Cập nhật thành công");
            }
        } else
            return redirect('admin/advertisement')->with("error", "Cập không thành công");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = AdvertisementAdmin::deleteAd($id);
        if ($result) {
            return redirect('admin/advertisement')->with("success", "Xóa thành công");
        } else
            return redirect('admin/advertisement')->with("error", "Xóa không thành công");
    }
}
