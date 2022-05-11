<div class='group cont-header'>
    <h1 class='logo'>
        <a href='/' class='logo-a'>HOME</a>
    </h1>
    <nav class='cf gnb' id='gnb'>
        <div class='btn-box'>
        </div>

        <ul class='menu dep-1'>
            <li>
                <a href='/rent' class='ic-reservation'>상담관리</a>
                <ul class='dep-2'>
                    <li><a href="/rent">신청 리스트</a></li>
                </ul>
            </li>
            @if(Auth::user()->grade <= 50)
                <li>
                    <a href='/user' class='ic-basic'>정보</a>
                    <ul class='dep-2'>
                        <li><a href="/user">직원 리스트</a></li>
                    </ul>
                </li>
            @endif
            @if(Auth::user()->grade == 1)
                <li>
                    <a href='/carmodel' class='ic-car'>챠량 관리</a>
                    <ul class='dep-2'>
                        <li>
                            <a href='#'>차량 등록</a>
                            <ul class='dep-3'>
                                <li><a href="/carmodel">모델 목록</a></li>
                                <li><a href="/vehicle">차량 목록</a></li>
                                <li><a href="/brand">제조사 목록</a></li>
                            </ul>
                        </li>
                        <li><a href="/shop">지식쇼핑 상품 목록</a></li>
                    </ul>
                </li>
                <li>
                    <a href='/stat' class='ic-report'>통계</a>
                    <ul class='dep-2'>
                        <li><a href="/stat">일별 통계</a></li>
                    </ul>
                </li>
                <li>
                    <a href='/info' class='ic-config'>관리자</a>
                    <ul class='dep-2'>
                        <li><a href='/info'>제휴사 목록</a></li>
                        <li><a href='/member'>사용자 목록</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </nav>
    <nav class='user-bar'>
        <span class='user'>
            {{ Auth::user()->name }} 님
            <i class='fa fa-user-circle'></i>
        </span>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <ul class='menu cf'>
                <li class='item item-1'><a href='/'><i class='icon-menu ic-home'></i> <span class='hidden'>홈</span></a></li>
                <li class='item item-2'><a href='{{ route('logout') }}' onclick="event.preventDefault(); this.closest('form').submit();"><i class='icon-menu ic-out'></i> <span class='hidden'>로그아웃</span></a>1</li>
                <li class='item item-1'><a onclick="page.layer('uinfo', 'adm', {{ Auth::user()->id }})"><i class='icon-menu ic-gear'></i> <span class='hidden'>정보수정</span></a></li>
            </ul>
        </form>

        <div class='site-info'>&nbsp;</div>
    </nav>
</div>
