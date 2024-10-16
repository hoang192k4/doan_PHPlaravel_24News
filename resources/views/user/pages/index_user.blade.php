@extends('user.layout_user.layout_user')
@section('content')
    {{-- Quảng cáo --}}
    <div class="container-fluid paddding mb-5">
        <div class="row mx-0">
            <div class="col-md-6 col-12 paddding animate-box" data-animate-effect="fadeIn">
                <div class="fh5co_suceefh5co_height_position_absolute"></div>
                @if (isset($advertisementone))
                    <div class="fh5co_suceefh5co_height"><img
                            src="{{ asset('images/' . $advertisementone->image) }}"alt="img" />
                        <div class="fh5co_suceefh5co_height_position_absolute_font">
                            <div><a href="{{ route('advertisement', ['id' => $advertisementone->id]) }}" class="color_fff"> <i
                                        class="fa fa-clock-o"></i>&nbsp;&nbsp;{{ \Carbon\Carbon::parse($advertisementone->adddate)->format('M d, Y') }}</a>
                            </div>
                            <div><a href="{{ route('advertisement', ['id' => $advertisementone->id]) }}"
                                    class="fh5co_good_font">{{ $advertisementone->title }}</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <div class="row">
                    @if (isset($advertisements))
                        @foreach ($advertisements as $advertisement)
                            <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                                <div class="fh5co_suceefh5co_height_position_absolute"></div>
                                <div class="fh5co_suceefh5co_height_2 d-flex justify-content-center">
                                    <img src="{{ asset('images/' . $advertisement->image) }}"
                                        style="max-width:100%;aspect-ratio: 2 / 2;" alt="img" />
                                    <div style="position: absolute; top: 60%; padding: 10px;z-index: 10;">
                                        <div>
                                            <a
                                                href="{{ route('advertisement', ['id' => $advertisement->id]) }}"class="color_fff">
                                                <i
                                                    class="fa fa-clock-o"></i>&nbsp;&nbsp;{{ \Carbon\Carbon::parse($advertisement->adddate)->format('M d, Y') }}</a>
                                        </div>
                                        <div>
                                            <a class="fh5co_good_font_1"
                                                href="{{ route('advertisement', ['id' => $advertisement->id]) }}">{{ $advertisement->title }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{-- Trendding --}}
    <div class="container-fluid pt-3">
        <div class="container animate-box" data-animate-effect="fadeIn">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
            </div>
            <div class="owl-carousel owl-theme js" id="slider1">
                @if (isset($newsTrenddings))
                    @foreach ($newsTrenddings as $newsTrendding)
                        <div class="item px-2">
                            <div class="fh5co_latest_trading_img_position_relative">
                                <div class="fh5co_latest_trading_img"><img style="width: 480px;height: 320px;"
                                        src="{{ asset('images/' . $newsTrendding->image) }}" alt="newsImage"
                                        class="fh5co_img_special_relative" /></div>
                                <div class="fh5co_latest_trading_img_position_absolute"></div>
                                <div class="fh5co_latest_trading_img_position_absolute_1">
                                    <a href="{{ route('detail_blog', ['id' => $newsTrendding->id]) }}" class="text-white">
                                        {{ $newsTrendding->title }} </a>
                                    <a href="{{ route('detail_blog', ['id' => $newsTrendding->id]) }}">
                                        <div class="fh5co_latest_trading_date_and_name_color">
                                            {{ ucwords($newsTrendding->username) }} -
                                            {{ \Carbon\Carbon::parse($newsTrendding->adddate)->format('M d, Y') }}
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    {{-- Newss --}}
    <div class="container-fluid pb-4 pt-5">
        <div class="container animate-box">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
            </div>
            <div class="owl-carousel owl-theme" id="slider2">
                @if (isset($newsCreate_At4s))
                    @foreach ($newsCreate_At4s as $newsCreate_At4)
                        <div class="item px-2">
                            <div class="fh5co_hover_news_img">
                                <a href="{{ route('detail_blog', ['id' => $newsCreate_At4->id]) }}">
                                    <div class="fh5co_news_img"><img src="{{ asset('images/' . $newsCreate_At4->image) }}"
                                            alt="newimg" /></div>
                                </a>
                                <div>
                                    <a href="{{ route('detail_blog', ['id' => $newsCreate_At4->id]) }}"
                                        class="d-block fh5co_small_post_heading"><span
                                            class="">{{ $newsCreate_At4->title }}</span></a>
                                    <div class="c_g"><i
                                            class="fa fa-clock-o"></i>&nbsp;&nbsp;{{ \Carbon\Carbon::parse($newsCreate_At4->adddate)->format('M d, y') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="container-fluid fh5co_video_news_bg pb-4">
        <div class="container animate-box" data-animate-effect="fadeIn">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom pt-5 pb-2 mb-4 ">Video News</div>
            </div>
            <div>
                <div class="owl-carousel owl-theme" id="slider3">
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_hover_news_img_video_tag_position_relative">
                                <div class="fh5co_news_img">
                                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/aj9vV3m0w_Q" frameborder="0"allowfullscreen></iframe>
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide">
                                    <img src="images/donal_trump.jpg" alt="donal_trump" />
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide" id="play-video">
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                        <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                            <span><i class="fa fa-play"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2">
                                <a href="#" class="d-block fh5co_small_post_heading ">
                                    <span class="">Donal Trump bị ám sát hụt lần 3</span></a>
                                <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2034</div>
                            </div>
                        </div>
                    </div>
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_hover_news_img_video_tag_position_relative">
                                <div class="fh5co_news_img">
                                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/ESKcU53Zg9M" frameborder="0"allowfullscreen></iframe>
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide_2">
                                    <img src="images/xuhuongcongnghe.jpg" alt="xuhuong" />
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide_2"
                                    id="play-video_2">
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                        <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                            <span><i class="fa fa-play"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2">
                                <a href="#" class="d-block fh5co_small_post_heading ">
                                    <span class="">Những xu hướng công nghệ định hình năm 2023</span></a>
                                <div class="c_g"><i class="fa fa-clock-o"></i> Oct 6,2023</div>
                            </div>
                        </div>
                    </div>
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_hover_news_img_video_tag_position_relative">
                                <div class="fh5co_news_img">
                                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/P0rMlipVreo" frameborder="0"allowfullscreen></iframe>
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide_3">
                                    <img src="images/diddydrama.jpg" alt="diddydrama" />
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide_3"
                                    id="play-video_3">
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                        <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                            <span><i class="fa fa-play"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2">
                                <a href="#" class="d-block fh5co_small_post_heading ">
                                    <span class="">Bê bối tình dục của rapper Diddy chấn động Hollywood | VTV24</span></a>
                                <div class="c_g"><i class="fa fa-clock-o"></i> Oct 9,2024</div>
                            </div>
                        </div>
                    </div>
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_hover_news_img_video_tag_position_relative">
                                <div class="fh5co_news_img">
                                    <iframe width="100%" height="200" src="https://www.youtube.com/embed/QTo1g9XlR1E" frameborder="0"allowfullscreen></iframe>
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide_4">
                                    <img src="images/bongda.jpg" alt="bongda" />
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide_4"
                                    id="play-video_4">
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                        <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                            <span><i class="fa fa-play"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2">
                                <a href="#" class="d-block fh5co_small_post_heading ">
                                    <span class="">MAN UNITED CHIA ĐIỂM, CHELSEA BỊ CẦM HOÀ, BARCELONA ĐẠI THẮNG</span></a>
                                <div class="c_g"><i class="fa fa-clock-o"></i> Oct 23,2024</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--   new_user --}}
    @include('user.partials.newblog_user')
@endsection
