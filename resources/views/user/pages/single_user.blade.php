@extends('user.layout_user.layout_user')
@section('content')
    <div class="single">
        @if (isset($detail))
            <div id="fh5co-title-box"
                style="background-image: url({{ asset('images/' . $detail->image) }}); background-cover:cover;"
                data-stellar-background-ratio="0.5">
                <div class="overlay"></div>
                <div class="page-title">
                    <img src="{{ asset('images/' . $detail->image) }}" alt="Free HTML5 by FreeHTMl5.co">
                    <span>{{ \Carbon\Carbon::parse($detail->adddate)->format('M d,y') }}</span>
                    <h2>{{ $detail->title }}</h2>
                </div>
            </div>
            <div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
                <div class="container paddding">
                    <div class="row mx-0">
                        <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                           <h1>Tác giả : {{ucWords($detail->username)}}</h1>
                           <h3>{{ \Carbon\Carbon::parse($detail->adddate)->format('M d,y')}}</h3>
                            {!! $detail->content !!}
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit quasi voluptates quos odit
                                adipisci ratione modi necessitatibus labore optio expedita nostrum perferendis architecto,
                                tempore facere illum quisquam cupiditate? Impedit quas illo asperiores autem incidunt amet
                                provident non tempora dolores in magnam, sed excepturi accusamus! Perspiciatis omnis
                                exercitationem ab pariatur voluptatem quas necessitatibus animi deleniti perferendis tempore
                                dolorem officia laborum, obcaecati quae. Veniam odio, dignissimos saepe, iure natus quia
                                incidunt soluta, dolorum nesciunt vero non iste nihil aperiam aliquid eum ipsam illum
                                blanditiis delectus inventore voluptas molestias facilis eius commodi. Veniam ipsum alias
                                iusto sed maxime ab exercitationem saepe corrupti? Aliquid laborum facere modi, cum
                                voluptatum aspernatur ipsum perspiciatis vero est quos, fugit, magni tenetur molestias
                                assumenda quas! Aliquid numquam, libero hic dolor soluta dolore iure qui, voluptatibus
                                cumque odio veniam nostrum consequatur consequuntur laborum molestias! Cumque maiores
                                architecto velit ullam iusto aspernatur ex dolorem, amet quidem, tempora cum impedit atque
                                in est voluptate ducimus rerum reprehenderit hic accusamus pariatur dolores. Totam natus
                                repellendus ipsum quod consequuntur id consequatur tempora quam illum dicta soluta officiis
                                animi adipisci excepturi accusamus repellat, libero inventore facere incidunt? Ipsa cum
                                dolorum veritatis et. Commodi nemo perspiciatis illo nesciunt voluptates cum eligendi quis,
                                alias quia ab.</p>
                        </div>
                        {{--   newtag_user --}}
                        @include('user.partials.newtag_user')
                    </div>
                </div>
            </div>
        @endif

        {{--      trending_user --}}
        @include('user.partials.trending_user')
    </div>
@endsection
