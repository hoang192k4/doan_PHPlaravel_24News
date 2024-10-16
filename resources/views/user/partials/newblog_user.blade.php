<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
                </div>
                @if(isset($news))
                    @foreach($news as $new)
                    <div class="row pb-4">
                        <div class="col-md-5">
                            <div class="fh5co_hover_news_img">
                                <a href="{{route('detail_blog',['id' =>$new->id])}}"><div class="fh5co_news_img"><img style="max-width:100%;object-fit: cover;" src="{{asset('images/'.$new->image)}}" s alt="imageblog"/></div></a>
                            </div>
                        </div>
                        <div class="col-md-7 animate-box">
                            <a href="{{route('detail_blog',['id' =>$new->id])}}" class="fh5co_magna py-2">{{$new->title}}</a><br>
                            <a href="{{route('detail_blog',['id' =>$new->id])}}" class="fh5co_mini_time py-3">{{ucWords($new->username)}} {{ \Carbon\Carbon::parse($new->adddate)->format('M d,y')}}</a>
                            <div style="display: -webkit-box; -webkit-box-orient: vertical;overflow: hidden; -webkit-line-clamp: 3">{!! $new->content !!} </div>
                        </div>
                    </div>
                    @endforeach
                @endif
                @if(isset($error))
                <div class="row pb-4">
                    <h3>{{$error}}</h3>
                </div>
                @endif
            </div>

        {{--   newtag_user --}}
            @include('user.partials.newtag_user')

        </div>
        {{ $news->appends(request()->all())->links('vendor.pagination.custom') }}
    </div>
</div>