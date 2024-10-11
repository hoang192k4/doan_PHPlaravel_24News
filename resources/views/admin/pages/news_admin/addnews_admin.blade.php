@extends('admin.layout_admin.layout_admin')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quản lý bài viết</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">
                <form action="{{route('news.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="author">Author</label>
                        <select class="form-control" id="author" name="author">
                          @foreach($accounts as $account)
                          <option value="{{$account->id}}" {{ $account->id == 1 ? 'selected' : ''}}>{{ $account->username }}</option>
                          @endforeach
                        </select>
                      </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" >
                      </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <input type="text" class="form-control" id="content" name="content" >
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image" onchange="previewImage(event)">
                        <img id="image-preview" style="padding :5px;max-width:100%" src="" alt="News Image">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category">
                          @foreach($categorys as $category)
                          <option value="{{$category->id}}" {{ $category->id == 1 ? 'selected' : ''}}>{{ $category->category }}</option>
                          @endforeach
                        </select>
                      </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
  function previewImage(event) {
        const imagePreview = document.getElementById('image-preview');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result; // Cập nhật thuộc tính src với ảnh đã chọn
            }
            reader.readAsDataURL(file); // Đọc tệp dưới dạng URL
        } else {
            imagePreview.src = ""; // Đặt lại src nếu không có tệp
        }
    }
</script>
@endsection