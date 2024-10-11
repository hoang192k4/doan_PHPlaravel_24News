@extends('admin.layout_admin.layout_admin')
@section('content')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            text-align: center;
            padding: 5px 10px;
        }

        .hidden_category {
            padding: 10px;
            display: none;
        }
    </style>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category</h1>
                    <div style="display: flex; align-items:center;margin-bottom:10px">
                        <div style="width: 19%">
                            <button onclick="showhidden_category()" style="padding:5px 0">
                                <a style="padding :10px 50px;text-decoration:none;" href="#{{-- {{ route('category.create')}} --}}">Add</a>
                            </button>
                        </div>
                        <div style="width:80%; margin:0 auto; ">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    @if (session('success'))
                        <h3 style="color: green">{{ session('success') }}</h3>
                    @endif
                    @if (session('error'))
                        <h3 style="color: red">{{ session('error') }}</h3>
                    @endif
                    <div class="hidden_category" id="hidden_category">
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category">Category</label>
                                <input type="text" class="form-control" id="category" name="category">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    @if (isset($category))
                        <form action="{{ route('category.update', $category->id) }}" method="POST" style="padding:10px">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="category">Category</label>
                                <input type="text" class="form-control" id="category" name="category"
                                    value="{{ $category->category }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    @endif
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                    <table>
                        <thead>
                            <th>STT</th>
                            <th>Category</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @if (isset($categorys))
                                @php $stt = 0 @endphp
                                @foreach ($categorys as $category)
                                    @php $stt++ @endphp
                                    <tr>
                                        <td>{{ $stt }}</td>
                                        <td>{{ $category->category }}</td>
                                        <td><a href="{{ route('category.edit', $category->id) }}"><i
                                                    class="fas fa-edit"></i></a></td>
                                        <td>
                                            <form action="{{ route('category.destroy', $category->id) }}" method="POST"
                                                onsubmit="return confirm('Bạn có chắc muốn xóa?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    style="border: none; background: none; cursor: pointer;">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>


            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <script>
        function showhidden_category() {
            const button = document.getElementById('hidden_category');
            button.style.display = 'block'
        }
    </script>
@endsection
