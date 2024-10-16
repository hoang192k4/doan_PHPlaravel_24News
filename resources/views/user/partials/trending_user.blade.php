<div class="container-fluid pb-4 pt-5">
    <div class="container animate-box">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
        </div>
        <div class="owl-carousel owl-theme" id="slider2">
                @foreach (App\Models\NewsAdmin::Lay4NewTrendding() as $newsTrendding)
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <a href="{{route('detail_blog',['id' =>$newsTrendding->id])}}"><div class="fh5co_news_img"><img src="{{asset('images/'.$newsTrendding->image)}}" alt="imgae" /></div></a>
                            <div>
                                <a href="{{route('detail_blog',['id' =>$newsTrendding->id])}}" class="d-block fh5co_small_post_heading"><span class="">{{$newsTrendding->title}}</span></a>
                                <div class="c_g"><i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{\Carbon\Carbon::parse($newsTrendding->adddate)->format('M d ,y')}}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
</div>
