@if ($paginator->hasPages())
    <div class="pagenation">
        <ul>
            <a href="?page=1">
                <li class="pre_10">
                    <span class="material-icons">keyboard_double_arrow_left</span>
                </li>
            </a>
            @if ($paginator->onFirstPage())
                <a href="javascript:alert('첫 페이지입니다.')">
                    <li class="pre">
                        <span class="material-icons-outlined">chevron_left</span>
                    </li>
                </a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}">
                    <li class="pre">
                        <span class="material-icons-outlined">chevron_left</span>
                    </li>
                </a>
            @endif

            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a><li class="on">{{ $page }}</li></a>
                        @else
                            <a href="{{ $url }}">
                                <li>{{ $page }}</li>
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach


            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}">
                    <li class="next">
                        <span class="material-icons-outlined">chevron_right</span>
                    </li>
                </a>
            @else
                <a href="javascript:alert('마지막 페이지입니다.')">
                    <li class="next">
                        <span class="material-icons-outlined">chevron_right</span>
                    </li>
                </a>
            @endif

            <a href="?page={{ $paginator->lastPage() }}">
                <li class="next_10">
                    <span class="material-icons">keyboard_double_arrow_right</span>
                </li>
            </a>
        </ul>
    </div>
@endif
