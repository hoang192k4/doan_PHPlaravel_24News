@extends('user.layout_user.layout_user')
@section('content')
        {{--   new_user --}}
    @include('user.partials.newblog_user')
        {{--    tredding_user  --}}
    @include('user.partials.trending_user')
@endsection