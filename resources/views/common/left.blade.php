<nav class="side_gnb_container">
    <div class="logo main_b" style="color: #fff; font-size: 35px; padding-top: 8px">{{ config("app.name") }}</div>
    <ul class="side_wrap">
        <li class="side_list"><a href="/"><span class="material-icons-outlined"> home </span>관리자홈</a></li>
        {{--<li class="side_list more" data-id="0">
            <a href="#">
                <span class="material-icons-outlined"> manage_search </span>
                사이트관리
                <span class="material-icons-outlined arrow">chevron_left</span>
            </a>
            <ul class="hidden_list">
                <li><a href="/web/default">기본 정보</a></li>
                <li><a href="/web/shipping">배송 정보</a></li>
                <li><a href="/web/banner">배너 관리</a></li>
                <li><a href="/web/coupon">포인트/쿠폰 관리</a></li>
            </ul>
        </li>
        <li class="side_list more" data-id="0">
            <a href="#">
                <span class="material-icons-outlined"> people </span>
                회원관리
                <span class="material-icons-outlined arrow">chevron_left</span>
            </a>
            <ul class="hidden_list">
                <li><a href="/member/list">일반회원</a></li>
                <li><a href="/member/deletelist">탈퇴회원</a></li>
                <li><a href="/member/suspendlist">정지회원</a></li>
            </ul>
        </li>--}}
        <li class="side_list more" data-id="{{ ($m1 == "goods") ? 1 : 0 }}">
            <a href="#">
                <span class="material-icons-outlined"> shopping_bag </span>
                상품관리
                <span class="material-icons-outlined arrow">chevron_left</span>
            </a>
            <ul class="hidden_list {{ ($m1 == "goods") ? "show" : "" }}">
                <li {{ ($m2 == "brand") ? "class=on" : "" }}><a href="/goods/brand">브랜드</a></li>
                <li {{ ($m2 == "category") ? "class=on" : "" }}><a href="/goods/category">카테고리</a></li>
                {{--<li><a href="/product/import">상품 가져오기</a></li>
                <li><a href="/product/product_list">상품 목록</a></li>
                <li><a href="/edit_product">상품등록</a></li>--}}
            </ul>
        </li>
        {{--<li class="side_list more" data-id="0">
            <a href="#">
                <span class="material-icons-outlined"> storefront </span>
                주문관리
                <span class="material-icons-outlined arrow">chevron_left</span>
            </a>
            <ul class="hidden_list">
                <li><a href="/order_d">도매꾹 주문내역</a></li>
                <li><a href="/order_s">자사 주문내역</a></li>
            </ul>
        </li>
        <li class="side_list more" data-id="0">
            <a href="#">
                <span class="material-icons-outlined"> payments </span>
                정산관리
                <span class="material-icons-outlined arrow">chevron_left</span>
            </a>
            <ul class="hidden_list">
                <li><a href="/balance/sale">매출현황</a></li>
                <li><a href="/balance/point_history">포인트 사용 내역</a></li>
                <li><a href="/balance/coupon_history">쿠폰 사용 내역</a></li>
            </ul>
        </li>
        <li class="side_list more" data-id="0">
            <a href="#">
                <span class="material-icons-outlined"> support_agent </span>
                문의관리
                <span class="material-icons-outlined arrow">chevron_left</span>
            </a>
            <ul class="hidden_list">
                <li>><a href="/inquiry/inquiry">상품문의</a></li>
                <li><a href="/inquiry/notice">공지사항</a></li>
                <li><a href="/inquiry/faq">1:1문의</a></li>
            </ul>
        </li>
        <li class="side_list more" data-id="0">
            <a href="#">
                <span class="material-icons-outlined"> event </span>
                이벤트관리
                <span class="material-icons-outlined arrow">chevron_left</span>
            </a>
            <ul class="hidden_list">
                <li><a href="/event/timespecial">기간한정 특별전</a></li>
                <li><a href="/event/bundle">묶음배송</a></li>
                <li><a href="/event/special">기획전</a></li>
                <li><a href="/event/best">인기상품(베스트)</a></li>
                <li><a href="/event/ddeng">땡처리(매진임박)</a></li>
                <li><a href="/event/recommend">살구마켓 추천</a></li>
                <li><a href="/event/low">최저가상품</a></li>
            </ul>
        </li>--}}
    </ul>
</nav>
