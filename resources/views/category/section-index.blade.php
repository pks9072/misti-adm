@extends("layouts.adm")

@section("etc")
    <link rel="stylesheet" href="{{ asset('css/dtree.css') }}">
    <link rel="stylesheet" href="{{ asset('css/event.css') }}">
    <script type="text/javascript" src="{{ asset('js/dtree.js') }}"></script>
@endsection

@section("contents")
    <main class="main">
        <div class="content_container">
            <div class="content_title_wrap">
                <h3>카테고리</h3>
            </div>
            <div class="flex pt_m pb_m flex_a_c pl_xl">
                <div class="flex flex_a_c">
                    <button type="button" class="user_btn" onclick="" style="margin-right:15px;">카테고리추가</button>
                    <button type="button" class="user_btn" onclick="" style="margin-right:15px;">수정</button>
                    <button type="button" class="user_btn" onclick="" style="margin-right:15px;">삭제</button>
                </div>
            </div>
            <hr/>
            <div class="pd_20 flex">
                <div class="search_list_container fl_5 mr_l">
                    <div class="mt_l search_list_wrap">
                        <div class="tree">
                            <ul class="sub_cate" id="sub_cate_88_00_00_00_00">
                                @foreach($list as $depth1)
                                    <li>
                                        <div class="tree_item">
                                            <button id="" class="close" onclick=""></button>
                                            <button id="" class="open none" onclick=""></button>
                                            <a class="folder" id="a_88_01_00_00_00" onclick="" data-ct_code="" data-ct_name="" data-ct_level="2">{{ $depth1->sname }}</a>
                                        </div>
                                    </li>
                                @endforeach
                                {{--<li>
                                    <div class="tree_item">
                                        <button id="" class="close" onclick=""></button>
                                        <button id="" class="open none" onclick=""></button>
                                        <a class="folder" id="a_88_01_00_00_00" onclick="" data-ct_code="" data-ct_name="" data-ct_level="2"></a>
                                    </div>
                                    <ul class="tree_item sub_cate" id="sub_cate_88_01_00_00_00">
                                        <li>
                                            <div class="tree_item">
                                                <button id="" class="close" onclick=""></button>
                                                <button id="" class="open none" onclick=""></button>
                                                <a class="folder" onclick="" data-ct_code="" data-ct_name="" data-ct_level="3"></a>
                                            </div>
                                            <ul class="sub_cate" id="sub_cate_88_01_01_00_00">
                                                <li>
                                                    <div class="tree_item">
                                                        <a class="folder" id="a_88_01_01_01_00" onclick="javascript:select_a_category('88_01_01_01_00')" data-ct_code="88_01_01_01_00" data-ct_name="LG" data-ct_level="4">LG</a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="tree_item">
                                                        <a class="folder" id="a_88_01_01_02_00" onclick="javascript:select_a_category('88_01_01_02_00')" data-ct_code="88_01_01_02_00" data-ct_name="samsung2" data-ct_level="4">samsung2</a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="tree_item">
                                                        <a class="folder" id="a_88_01_01_03_00" onclick="javascript:select_a_category('88_01_01_03_00')" data-ct_code="88_01_01_03_00" data-ct_name="apple" data-ct_level="4">apple</a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="tree_item">
                                                        <a class="folder" id="a_88_01_01_04_00" onclick="javascript:select_a_category('88_01_01_04_00')" data-ct_code="88_01_01_04_00" data-ct_name="DEL" data-ct_level="4">DEL</a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="tree_item">
                                                        <button id="close_88_01_01_05_00" class="close" onclick="javascript:hide_action('88_01_01_05_00');"></button>
                                                        <button id="open_88_01_01_05_00" class="open none" onclick="javascript:show_action('88_01_01_05_00');"></button>
                                                        <a class="folder" id="a_88_01_01_05_00" onclick="javascript:select_a_category('88_01_01_05_00')" data-ct_code="88_01_01_05_00" data-ct_name="Novida" data-ct_level="4">Novida</a>
                                                    </div>
                                                    <ul class="sub_cate" id="sub_cate_88_01_01_05_00">
                                                        <li>
                                                            <div class="tree_item">
                                                                <a class="folder" id="a_88_01_01_05_01" onclick="javascript:select_a_category('88_01_01_05_01')" data-ct_code="88_01_01_05_01" data-ct_name="novi1" data-ct_level="5">novi1</a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>--}}
                                {{--<li>
                                    <div class="tree_item">
                                        <button id="close_88_02_00_00_00" class="close" onclick="javascript:hide_action('88_02_00_00_00');"></button>
                                        <button id="open_88_02_00_00_00" class="open none" onclick="javascript:show_action('88_02_00_00_00');"></button>
                                        <a class="folder" id="a_88_02_00_00_00" onclick="javascript:select_a_category('88_02_00_00_00')" data-ct_code="88_02_00_00_00" data-ct_name="테스트 테스트" data-ct_level="2">테스트 테스트</a>
                                    </div>
                                    <ul class="tree_item sub_cate" id="sub_cate_88_02_00_00_00">
                                        <li>
                                            <div class="tree_item">
                                                <button id="close_88_02_01_00_00" class="close" onclick="javascript:hide_action('88_02_01_00_00');"></button>
                                                <button id="open_88_02_01_00_00" class="open none" onclick="javascript:show_action('88_02_01_00_00');"></button>
                                                <a class="folder" id="a_88_02_01_00_00" onclick="javascript:select_a_category('88_02_01_00_00')" data-ct_code="88_02_01_00_00" data-ct_name="3 뎁스" data-ct_level="3">3 뎁스</a>
                                            </div>
                                            <ul class="sub_cate" id="sub_cate_88_02_01_00_00">
                                                <li>
                                                    <div class="tree_item">
                                                        <a class="folder" id="a_88_02_01_01_00" onclick="javascript:select_a_category('88_02_01_01_00')" data-ct_code="88_02_01_01_00" data-ct_name="4뎁스" data-ct_level="4">4뎁스</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <div class="tree_item">
                                                <a class="folder" id="a_88_02_02_00_00" onclick="javascript:select_a_category('88_02_02_00_00')" data-ct_code="88_02_02_00_00" data-ct_name="4뎁스-1" data-ct_level="3">4뎁스-1</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="tree_item">
                                        <a class="folder" id="a_88_03_00_00_00" onclick="javascript:select_a_category('88_03_00_00_00')" data-ct_code="88_03_00_00_00" data-ct_name="2뎁스" data-ct_level="2">2뎁스</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="tree_item">
                                        <a class="folder" id="a_88_05_00_00_00" onclick="javascript:select_a_category('88_05_00_00_00')" data-ct_code="88_05_00_00_00" data-ct_name="가구" data-ct_level="2">가구</a>
                                    </div>
                                </li>--}}

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="search_list_container fl_5">
                    <form name="c_form" id="c_form" method="POST" action="/product/save_self_category_event">
                        @csrf
                        <div class="mt_l search_list_wrap">
                            <ul>
                                <li>
                                    <div class="content_input mb_m" style="max-width:100%;">
                                        <input type="text" name="category_name" id="category_name" placeholder="카테고리이름">
                                    </div>
                                </li>
                                <li>
                                    <div class="content_input mb_m" style="max-width:100%;">
                                        <input type="text" name="category_code" id="category_code" placeholder="카테고리코드" readonly>
                                    </div>
                                </li>
                                <li>
                                    <button class="event_del_btn" onclick="javascript:save_self_category_event();">확인</button>
                                </li>
                            </ul>
                        </div>
                        <input type="hidden" name="w" id="w" value="">
                        <input type="hidden" name="category_level" id="category_level" value="">
                    </form>
                </div>
            </div>
    </main>
@endsection

@section("script")
    <script src="{{ mix('js/brand.js') }}"></script>
@endsection
