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
    </style>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý người dùng đăng ký</h1>
                    <div style="width:80%; margin:10px auto; ">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    @if (session('success'))
                        <h3 style="color: green">{{ session('success') }}</h3>
                    @endif
                    @if (session('error'))
                        <h3 style="color: red">{{ session('error') }}</h3>
                    @endif
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                    <table>
                        <thead>
                            <th>STT</th>
                            <th>Email</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @if (isset($subcribers))
                                @php $stt = 0 @endphp
                                @foreach ($subcribers as $subcriber)
                                    @php $stt++ @endphp
                                    <tr>
                                        <td>{{ $stt }}</td>
                                        <td>{{ $subcriber->email }}</td>
                                        <td>
                                            {{--   Sử dụng Ajax  --}}
                                            {{-- <a href="#" onclick="event.preventDefault(); if(confirm('Bạn có chắc muốn xóa?')) 
                                            { 
                                                $.ajax({
                                                    url: '{{ route('subscriber.destroy', $subcriber->id) }}',
                                                    type: 'POST',
                                                    data: {
                                                        _method: 'DELETE',
                                                        _token: '{{ csrf_token() }}',
                                                    },
                                                    success: function(result) {
                                                        // Xử lý khi xóa thành công
                                                        alert('Đã xóa thành công!');
                                                        location.reload(); // Tải lại trang hoặc xóa phần tử khỏi DOM
                                                        //bên dưới là cách xóa khỏi DOM
                                                        //$('#subscriber-' + id).remove();
                                                    },
                                                    error: function(xhr) {
                                                        // Xử lý lỗi
                                                        alert('Có lỗi xảy ra!');
                                                    }
                                                });
                                            }">
                                                <i class="fas fa-trash-alt"></i>
                                            </a> --}}
                                            <form action="{{ route('subscriber.destroy', $subcriber->id) }}" method="POST"
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
@endsection
