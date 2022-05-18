@php($base = "dash")
@php($base3 = "")
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config("app.name") }}</title>
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('common/css/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('common/css/common.css') }}" />
    @if($base=='dash')
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    @elseif($base=='product')
        <link rel="stylesheet" href="{{ asset('css/category.css') }}" />
    @elseif($base=='member')
        <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
    @elseif($base=='web')
        <link rel="stylesheet" href="{{ asset('css/web.css') }}" />
    @elseif($base=='order')
        <link rel="stylesheet" href="{{ asset('css/order.css') }}" />
    @elseif($base=='balance')
        <link rel="stylesheet" href="{{ asset('css/balance.css') }}" />
    @elseif($base=='event')
        <link rel="stylesheet" href="{{ asset('css/event.css') }}" />
    @elseif($base=='inquiry')
        <link rel="stylesheet" href="{{ asset('css/inquiry.css') }}" />
    @endif
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}" ></script>
    <script src="{{ asset('js/admin.js') }}" defer></script>
    <?php if($base3=="banner"){?>
    <script src="{{ asset('js/web.js') }}"></script>
    <?php }?>

</head>
<body>
@if($base=='dash')
    <section class="admin_container">
        @elseif($base=='product' || $base=='member' || $base=='web' || $base=='order' || $base=='balance' || $base=='event' || $base=='inquiry')
            <section class="container">
                @endif
                <header>
                    <nav class="side_gnb_container">
                        <div class="logo main_b" style="color: #fff; font-size: 35px; padding-top: 10px">
                            {{ config("app.name") }}
                        </div>
                        <ul class="side_wrap">
                            <li class="side_list">
                                <a href="/"><span class="material-icons-outlined"> home </span>관리자홈</a></li>
                            <li class="side_list more" data-id="<?php if($base=='web'){echo "1";}else{echo "0";}?>">
                                <a href="#"><span class="material-icons-outlined"> manage_search </span>사이트관리<span
                                        class="material-icons-outlined arrow">
                chevron_left
              </span></a>
                                <ul class="hidden_list <?php if($base=='web'){echo "show";}?>">
                                    <li <?php if($base3=="default"){echo "class='on'";}?>><a href="/web/default">기본 정보</a></li>
                                    <li <?php if($base3=="shipping"){echo "class='on'";}?>><a href="/web/shipping">배송 정보</a></li>
                                    <li <?php if($base3=="banner"){echo "class='on'";}?>><a href="/web/banner">배너 관리</a></li>
                                    <li <?php if($base3=="coupon"){echo "class='on'";}?>><a href="/web/coupon">포인트/쿠폰 관리</a></li>
                                </ul>
                            </li>
                            <li class="side_list more" data-id="<?php if($base=='member'){echo "1";}else{echo "0";}?>">
                                <a href="#"><span class="material-icons-outlined"> people </span>회원관리<span
                                        class="material-icons-outlined arrow">
                chevron_left
              </span></a>
                                <ul class="hidden_list <?php if($base=='member'){echo "show";}?>">
                                    <li <?php if($base3=="list"){echo "class='on'";}?>><a href="/member/list">일반회원</a></li>
                                    <li <?php if($base3=="deletelist"){echo "class='on'";}?>><a href="/member/deletelist">탈퇴회원</a></li>
                                    <li <?php if($base3=="suspendlist"){echo "class='on'";}?>><a href="/member/suspendlist">정지회원</a></li>
                                </ul>
                            </li>
                            <li class="side_list more" data-id="<?php if($base=='product'){echo "1";}else{echo "0";}?>">
                                <a href="#"><span class="material-icons-outlined"> shopping_bag </span>상품관리
                                    <span class="material-icons-outlined arrow">
                chevron_left
              </span>
                                </a>
                                <ul class="hidden_list <?php if($base=='product'){echo "show";}?>">
                                    <li <?php if($base3=="category"){echo "class='on'";}?>><a href="/product/category">카테고리 동기화</a></li>
                                    <li <?php if($base3=="self_category" || $base3=="add_category" || $base3=="edit_category"){echo "class='on'";}?>><a href="/product/self_category">자체카테고리 관리</a></li>
                                    <li <?php if($base3=="import"){echo "class='on'";}?>><a href="/product/import">상품 가져오기</a></li>
                                    <li <?php if($base3=="product_list"){echo "class='on'";}?>><a href="/product/product_list">상품 목록</a></li>
                                    <li <?php if($base3=="edit_product"){echo "class='on'";}?>><a href="/edit_product">상품등록</a></li>
                                </ul>
                            </li class="side_list">
                            <li class="side_list more" data-id="<?php if($base=='order'){echo "1";}else{echo "0";}?>"><a><span class="material-icons-outlined"> storefront </span>주문관리<span
                                        class="material-icons-outlined arrow">
                chevron_left
              </span></a>
                                <ul class="hidden_list <?php if($base=='order'){echo "show";}?>">
                                    <li <?php if($base3=="order_d"){echo "class='on'";}?>><a href="/order_d">도매꾹 주문내역</a></li>
                                    <li <?php if($base3=="order_s"){echo "class='on'";}?>><a href="/order_s">자사 주문내역</a></li>
                                </ul>
                            </li class="side_list">
                            <li class="side_list more" data-id="<?php if($base=='balance'){echo "1";}else{echo "0";}?>">
                                <a href="#"><span class="material-icons-outlined"> payments </span>정산관리<span
                                        class="material-icons-outlined arrow">
                chevron_left
              </span></a>
                                <ul class="hidden_list <?php if($base=='balance'){echo "show";}?>">
                                    <li <?php if($base3=="sale"){echo "class='on'";}?>><a href="/balance/sale">매출현황</a></li>
                                    <li <?php if($base3=="point_history"){echo "class='on'";}?>><a href="/balance/point_history">포인트 사용 내역</a></li>
                                    <li <?php if($base3=="coupon_history"){echo "class='on'";}?>><a href="/balance/coupon_history">쿠폰 사용 내역</a></li>
                                </ul>
                            </li>
                            <li class="side_list more" data-id="<?php if($base=='inquiry'){echo "1";}else{echo "0";}?>">
                                <a href="#"><span class="material-icons-outlined"> support_agent </span>문의관리<span
                                        class="material-icons-outlined arrow">
                chevron_left
              </span></a>
                                <ul class="hidden_list <?php if($base=='inquiry'){echo "show";}?>">
                                    <li <?php if($base3=="inquiry"){echo "class='on'";}?>><a href="/inquiry/inquiry">상품문의</a></li>
                                    <li <?php if($base3=="notice"){echo "class='on'";}?>><a href="/inquiry/notice">공지사항</a></li>
                                    <li <?php if($base3=="faq"){echo "class='on'";}?>><a href="/inquiry/faq">1:1문의</a></li>
                                </ul>
                            </li>
                            <li class="side_list more" data-id="<?php if($base=='event'){echo "1";}else{echo "0";}?>">
                                <a href="#"><span class="material-icons-outlined"> event </span>이벤트관리<span
                                        class="material-icons-outlined arrow">
                chevron_left
              </span></a>
                                <ul class="hidden_list <?php if($base=='event'){echo "show";}?>">
                                    <li <?php if($base3=="timespecial"){echo "class='on'";}?>><a href="/event/timespecial">기간한정 특별전</a></li>
                                    <li <?php if($base3=="bundle"){echo "class='on'";}?>><a href="/event/bundle">묶음배송</a></li>
                                    <li <?php if($base3=="special"){echo "class='on'";}?>><a href="/event/special">기획전</a></li>
                                    <li <?php if($base3=="best"){echo "class='on'";}?>><a href="/event/best">인기상품(베스트)</a></li>
                                    <li <?php if($base3=="ddeng"){echo "class='on'";}?>><a href="/event/ddeng">땡처리(매진임박)</a></li>
                                    <li <?php if($base3=="recommend"){echo "class='on'";}?>><a href="/event/recommend">살구마켓 추천</a></li>
                                    <li <?php if($base3=="low"){echo "class='on'";}?>><a href="/event/low">최저가상품</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <div class="user_wrap">
                        <div class="menu_hide"><span class="material-icons-outlined grey_c">
            menu
          </span></div>
                        <div>
                            <a href="http://sal9mall.co.kr" class="salgu_btn mr_l grey_c">
                                살구마켓 가기
                                <span class="material-icons-outlined">
              arrow_right
            </span>
                            </a>
                            <div class="user_btn">
                                <span class="material-icons mr_m "> account_circle </span>
                                <p class="mr_m">최고관리자</p>
                                <span class="material-icons"> arrow_drop_down </span>
                            </div>
                        </div>
                        <div class="logout">
                            <p><a href="/logout">로그아웃</a></p>
                        </div>
                    </div>
                </header>
                <script>
                    $(document).ready(function(){
                        $(".more").click(function(){

                            if( $(this).attr("data-id")=='1')
                            {

                            }else{

                                $(".more").attr("data-id","0");
                                $(this).attr("data-id","1");
                                $(".hidden_list").removeClass("show");
                                $(this).find(".hidden_list").addClass("show");
                            }
                        });
                    });
                </script>
