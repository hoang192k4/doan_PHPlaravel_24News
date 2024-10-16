@extends('admin.layout_admin.layout_admin')
@section('content')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 5px 10px;
            text-align: center;
        }
    </style>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý bài viết quảng cáo</h1>
                    <div style="display: flex; align-items:center;margin-bottom:10px">
                        <div style="width: 19%; display:flex;justify-content:space-around">
                            <button style="padding :5px 0;">
                                <a style="padding :10px 50px;text-decoration:none;" href="{{route('advertisement.create')}}">Add</a>
                            </button>
                            <button style="padding:5px 0">
                                <a style="padding :10px ;text-decoration:none;" href="{{route('advertisement.index')}}"><i
                                        class="fas fa-sync"></i></a>
                            </button>
                        </div>
                        <div style="width:80%; margin:0 auto; ">
                            <form action="" method="GET">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" value="{{request()->input('keyword')}}"
                                        placeholder="Search..." name="keyword">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
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
                            <th>Author</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Image</th>
                            <th>View</th>
                            <th>Add Date</th>
                            <th>Category</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @if (isset($advertisements))
                                @php $stt = 0 @endphp
                                @foreach ($advertisements as $advertisement)
                                    @php $stt++ @endphp
                                    <tr>
                                        <td>{{ $stt }}</td>
                                        <td>{{ $advertisement->username }}</td>
                                        <td>{{ $advertisement->title }}</td>
                                        <td>{!! $advertisement->content !!}</td>
                                        <td><img style="max-width:200px" src="{{ asset('images/' . $advertisement->image) }}"
                                                alt="News Image"></td>
                                        <td>{{ $advertisement->view }}</td>
                                        <td>{{ $advertisement->adddate }}</td>
                                        <td>{{ $advertisement->category }}</td>
                                        <td style="padding:0"><a href="{{ route('advertisement.edit', $advertisement->id) }}"><i
                                                    class="fas fa-edit" style="padding:15px"></i></a></td>
                                        <td>
                                            <form action="{{ route('advertisement.destroy', $advertisement->id) }}" method="POST"
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
                            @if (isset($message))
                                <tr>
                                    <td colspan="10" style="text-algin:center"> {{ $message }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>    
                      {{ $advertisements->appends(request()->all())->links() }}
            </div>


            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
