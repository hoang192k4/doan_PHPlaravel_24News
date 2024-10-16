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

        .hidden_account {
            padding: 10px;
            display: none;
        }
    </style>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý tài khoản</h1>
                    <div style="display: flex; align-items:center;margin-bottom:10px">
                        <div style="width: 19%; display:flex;justify-content:space-around">
                            <button onclick="showhidden_account()" style="padding:5px 0">
                                <a style="padding :10px 50px;text-decoration:none;" href="#{{-- {{ route('account.create')}} --}}">Add</a>
                            
                            </button>
                            <button style="padding:5px 0">
                                <a style="padding :10px ;text-decoration:none;" href="{{ route('account.index')}}"><i class="fas fa-sync"></i></a>
                            </button>
                        </div>
                        <div style="width:80%; margin:0 auto; ">
                            <form action="{{ route('account.index') }}" method="GET">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" value="{{request()->input('keyword')}}" placeholder="Search..." name="keyword">
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
                        <h3 style="color: green;">{{ session('success') }}</h3>
                    @endif
                    @if (session('error'))
                        <h3 style="color: red">{{ session('error') }}</h3>
                    @endif

                    {{-- add account --}}
                    <div class="hidden_account" id="hidden_account">
                        <form action="{{ route('account.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="username">UserName</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    {{-- edit account --}}
                    @if (isset($account))
                        <form action="{{ route('account.update', $account->id) }}" method="POST" style="padding:10px">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="username">UserName</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    value="{{ $account->username }}">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" name="password"
                                    value="{{ $account->password }}">
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
                            <th>username</th>
                            <th>password</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            @if (isset($accounts) && count($accounts) > 0)
                                @php $stt = 0 @endphp
                                @foreach ($accounts as $account)
                                    @php $stt++ @endphp
                                    <tr>
                                        <td>{{ $stt }}</td>
                                        <td>{{ $account->username }}</td>
                                        <td>{{ $account->password }}</td>
                                        <td><a href="{{ route('account.edit', $account->id) }}"><i
                                                    class="fas fa-edit"></i></a></td>
                                        <td>
                                            <form action="{{ route('account.destroy', $account->id) }}" method="POST"
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
                            @if(isset($message))
                            <tr>
                                <td colspan="5" style="text-align: center;">{{$message}}</td>
                            </tr>
                            @endif
               
                        </tbody>
                      
                    </table>
                    {{$accounts->appends(request()->all())->links()}}
                </div>
            </div>


            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <script>
        function showhidden_account() {
            const button = document.getElementById('hidden_account');
            button.style.display = 'block'
        }
    </script>
@endsection
