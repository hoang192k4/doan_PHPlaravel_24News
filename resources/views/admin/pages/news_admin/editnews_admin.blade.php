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
                <form action="{{route('news.update',$news->id)}}" method="POST" style="padding:10px" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="author">Author</label>
                        <select class="form-control" id="author" name="author">
                          @foreach($accounts as $account)
                          <option value="{{$account->id}}" {{ $account->id == $news->author ? 'selected' : ''}}>{{ $account->username }}</option>
                          @endforeach
                        </select>
                      </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$news->title}}">
                      </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <input type="text" class="form-control" id="content" name="content" value="{{$news->content}}">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image" onchange="previewImage()">
                        @if(isset($news->image))
                          <img id="image-preview" style="padding :5px;max-width:100%" src="{{asset('images/'.$news->image)}}" alt="News Image">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category">
                          @foreach($categorys as $category)
                          <option value="{{$category->id}}" {{ $category->id == $news->category ? 'selected' : ''}}>{{ $category->category }}</option>
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
  function previewImage() {
      const input = document.getElementById('image');
      const preview = document.getElementById('image-preview');

      // Kiểm tra xem có tệp nào được chọn không
      if (input.files && input.files[0]) {
          const reader = new FileReader();

          // Khi tệp đã được tải lên
          reader.onload = function(e) {
              // Cập nhật src của hình ảnh
              preview.src = e.target.result;
          };

          // Đọc tệp hình ảnh
          reader.readAsDataURL(input.files[0]);
      }
  }
</script>
@endsection