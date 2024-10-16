<style>
    .btn_pagging.active {
    background-color: #333;
    color: #fff;
    cursor: default;
}

.btn_pagging.disabled, .btn_mange_pagging.disabled {
    pointer-events: none;
    opacity: 0.6;
}
</style>
{{--     Kiểm tra nếu có phân trang thì hiển thị phân trang còn nếu chỉ mới có một trang thì không hiển thị --}}
@if ($paginator->hasPages())
    <div class="row mx-0 animate-box" data-animate-effect="fadeInUp">
        <div class="col-12 text-center pb-4 pt-4">
            {{-- Kiểm tra trang hiện tại có phải là trang đầu tiên không nếu là trang đầu thì
            hiện nút nhưng không cho nó sử dụng nhưng nếu không là trang đầu tiên thì có thể bấm để quay lại trang trước --}}
            @if ($paginator->onFirstPage())
                <a class="btn_mange_pagging disabled"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous</a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="btn_mange_pagging"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous</a>
            @endif

            {{-- Xuất ra những trang --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <a class="btn_pagging disabled">{{ $element }}</a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="btn_pagging active">{{ $page }}</a>
                        @else
                            <a href="{{ $url }}" class="btn_pagging">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Kiểm tra tiếp theo còn trang không nếu không còn thì nó không được dùng bị disabled đi
            còn nếu còn thì sẽ được dùng để chuyển trang tiếp theo --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="btn_mange_pagging">Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp;</a>
            @else
                <a class="btn_mange_pagging disabled">Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp;</a>
            @endif
        </div>
    </div>
@endif