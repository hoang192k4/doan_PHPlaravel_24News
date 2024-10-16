<div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
    <div>
        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
    </div>
    <div class="clearfix"></div>
    <div class="fh5co_tags_all">
        @foreach (App\Models\CategoryAdmin::layAllShow() as $category)
            <a href="{{ route('blog_category', ['id' => $category->id]) }}" class="fh5co_tagg">{{ $category->category }}</a>
        @endforeach
    </div>
    <div>
        <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
    </div>
    {{-- hót nhất lĩnh vực game --}}
    @foreach(App\Models\NewsAdmin::layMostPopular(1) as $new)
    <div class="row pb-3">
        <div class="col-5 align-self-center">
           <a href="{{route('detail_blog',['id' => $new->id])}}"> <img src="{{asset('images/'.$new->image)}}" alt="img" class="fh5co_most_trading" /></a>
        </div>
        <div class="col-7 paddding">
            <a href="{{route('detail_blog',['id' => $new->id])}}"><div class="most_fh5co_treding_font"> {{$new->title}}</div></a>
            <div class="most_fh5co_treding_font_123">{{Carbon\Carbon::parse($new->adddate)->format("M d ,y")}}</div>
        </div>
    </div>
    @endforeach
    {{-- hót nhất lĩnh vực công nghệ --}}
    @foreach(App\Models\NewsAdmin::layMostPopular(2) as $new)
    <div class="row pb-3">
        <div class="col-5 align-self-center">
           <a href="{{route('detail_blog',['id' => $new->id])}}"> <img src="{{asset('images/'.$new->image)}}" alt="img" class="fh5co_most_trading" /></a>
        </div>
        <div class="col-7 paddding">
            <a href="{{route('detail_blog',['id' => $new->id])}}"><div class="most_fh5co_treding_font"> {{$new->title}}</div></a>
            <div class="most_fh5co_treding_font_123">{{Carbon\Carbon::parse($new->adddate)->format("M d ,y")}}</div>
        </div>
    </div>
    @endforeach
    {{-- Hót nhất lĩnh vực âm nhạc --}}
    @foreach(App\Models\NewsAdmin::layMostPopular(3) as $new)
    <div class="row pb-3">
        <div class="col-5 align-self-center">
           <a href="{{route('detail_blog',['id' => $new->id])}}"> <img src="{{asset('images/'.$new->image)}}" alt="img" class="fh5co_most_trading" /></a>
        </div>
        <div class="col-7 paddding">
            <a href="{{route('detail_blog',['id' => $new->id])}}"><div class="most_fh5co_treding_font"> {{$new->title}}</div></a>
            <div class="most_fh5co_treding_font_123">{{Carbon\Carbon::parse($new->adddate)->format("M d ,y")}}</div>
        </div>
    </div>
    @endforeach
    {{-- Hót nhất lĩnh vực thế giưới --}}
    @foreach(App\Models\NewsAdmin::layMostPopular(8) as $new)
    <div class="row pb-3">
        <div class="col-5 align-self-center">
           <a href="{{route('detail_blog',['id' => $new->id])}}"> <img src="{{asset('images/'.$new->image)}}" alt="img" class="fh5co_most_trading" /></a>
        </div>
        <div class="col-7 paddding">
            <a href="{{route('detail_blog',['id' => $new->id])}}"><div class="most_fh5co_treding_font"> {{$new->title}}</div></a>
            <div class="most_fh5co_treding_font_123">{{Carbon\Carbon::parse($new->adddate)->format("M d ,y")}}</div>
        </div>
    </div>
    @endforeach
</div>
