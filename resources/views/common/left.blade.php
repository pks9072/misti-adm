@php
    $url = $_SERVER["REQUEST_URI"];
    $bookmark = json_decode(Auth::user()->favorites, true);
    $length = is_array($bookmark) ? sizeof($bookmark) : 0;
@endphp
<aside class="sidebar left">
    <h2 class="hidden">사이드 네비게이션</h2>
    <div class="lnb" id="favorites">
        @if($length < 9)
            <a class="btna quick-plus" onclick="page.favorites(1, $('h2.skip').text(), '{{ $url }}')"><img src="{{ asset('img/icon/quick/quickMenuPlus.png') }}" alt="즐겨찾기 메뉴 추가"></a>
        @endif
        @if($length < 1)
            <a class="btna quick-none"><img src="{{ asset("img/icon/quick/split.png") }}" alt="즐겨찾기 메뉴 없음"></a>
        @else
            <ul class="menu cf">
                @for($i = 0; $i < $length; $i++)
                    @php
                        $_class	= ($url == $bookmark[$i]['path']) ? ' on' : '';
                        $_img	= explode('/', $bookmark[$i]['path']);
                    @endphp
                    <li class="item{{ $_class }}">
                        <a href="{{ $bookmark[$i]['path'] }}">
                            <img src="{{ asset('img/icon/quick/'.$_img[1]) }}.png" alt="{{ $bookmark[$i]['title'] ?? '' }}">
                            <span class="lbl">{{ $bookmark[$i]['title'] ?? '' }}</span>
                        </a>
                    </li>
                @endfor
            </ul>
        @endif

        <div class="qm-pop">
            <ul class="qm-list">
                <li ref="deleteOne"><img src="{{ asset("img/icon/doc.png") }}" alt="DOC"> 삭제</li>
                <li class="division"></li>
                <li ref="deleteAll"><img src="{{ asset("img/icon/doc.png") }}" alt="DOC"> 전체 삭제</li>
            </ul>
        </div>
    </div>
</aside>
