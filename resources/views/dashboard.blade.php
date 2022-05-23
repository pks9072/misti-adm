@extends("layouts.adm")

@section("contents")
    <main class="main">
        <section>
            <div class="sales_container">
                <div class="date_wrap">
                    <h3>매출현황</h3>
                    <select name="schedule" id="schedule" form="date_form" class="date_form">
                        <option value="week">일주일</option>
                        <option value="month">1개월</option>
                        <option value="3month">3개월</option>
                        <option value="6month">6개월</option>
                    </select>
                    <script>
                        $(document).ready(function() {
                            $("#schedule").on('change',function(){

                                var sel = $("#schedule option:selected").val();

                                if( sel =='week' ){
                                    location.href="/dashboard?type=week";
                                }else if( sel =='month' ){
                                    location.href="/dashboard?type=month";
                                }else if( sel =='3month'){
                                    location.href="/dashboard?type=3month";
                                }else if( sel =='6month'){
                                    location.href="/dashboard?type=6month";
                                }
                            });
                        });
                    </script>
                </div>
                <hr/>
                <div class="sales_graph">
                    <iframe src="/statics1?type=" style="width:100%;height:380px;border:0px;" scrolling="no"></iframe>
                </div>
                <hr/>
                <div class="sales_graph">
                    <iframe src="/statics2?type=" style="width:100%;height:380px;border:0px;" scrolling="no"></iframe>
                </div>
                <!--div class="sale_info_wrap">
                    <ul class="sale_info">레
                        <li>
                            <span class="green"></span> 이블레정산
                        </li>
                        <li><span class="red"></span class="green"> 환불/취소</li>
                        <li><span class="blue"></span class="green"> 포인트/쿠폰 사용</li>
                        <li><span class="orange"></span class="green"> 주문</li>
                    </ul>
                    <a href="#" class="sales_btn">매출현황 가기 <span class="material-icons-outlined">
                        arrow_right
                        </span></a>
                </div-->
            </div>
            <div class="sales_detail_container">
                <ul class="sales_detail_wrap">
                    <li class="sales_detail">
                        <p class="sales_detail_title">주문</p>
                        <p></p>
                    </li>
                    <li class="sales_detail">
                        <p class="sales_detail_title" >포인트/쿠폰 사용</p>
                        <p></p>
                    </li>
                    <li class="sales_detail">
                        <p class="sales_detail_title">취소/환불</p>

                        <p></p>
                    </li>
                    <li class="sales_detail">
                        <p class="sales_detail_title">이블레 정산</p>
                        <p></p>
                    </li>
                    <li class="sales_detail">
                        <p class="sales_detail_title">순 수익 합계</p>

                        <p class="bold main_c"></p>
                    </li>
                </ul>
            </div>
            <div class="pro_user_container">
                <div class="product_container">
                    <div class="product_title_wrap">
                        <div>
                            <h3>판매가 미등록 상품</h3>
                            <!--p class="font_s grey_c">업데이트 : 2021.09.25</p-->
                        </div>
                        <a href="/product/product_list" class="product_btn">상품관리 가기 <span class="material-icons-outlined">
                            arrow_right
                            </span></a>
                    </div>
                    <hr/>
                    <ul class="product_list_wrap">

                        <li class="product_list_title_wrap">
                            <ul class="list_title product_list_title">
                                <li>상품번호</li>
                                <li>상품 정보</li>
                                <li>이블레 원가</li>
                            </ul>
                        </li>

                        <tr>
                            <td colspan="10" class="text_ac">
                                데이터가 없습니다.
                            </td>
                        </tr>

                    </ul>
                </div>
                <div class="user_container">
                    <div class="product_title_wrap">
                        <div>
                            <h3>회원 현황</h3>
                        </div>
                        <a href="/member/list" class="product_btn">회원관리 가기 <span class="material-icons-outlined">
                            arrow_right
                            </span></a>
                    </div>
                    <hr/>
                    <ul class="product_list_wrap user_list_wrap">
                        <li class="product_list_title_wrap">
                            <ul class="list_title user_list_title">
                                <li>일시</li>
                                <li>신규회원</li>
                                <li>탈퇴회원</li>
                                <li>정지회원</li>
                                <li>회원합계</li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="new_order_container">
                <div class="product_container">
                    <div class="product_title_wrap">
                        <div>
                            <h3>신규 주문 접수</h3>

                        </div>
                        <a href="/order" class="product_btn">전체 보기 <span class="material-icons-outlined">
                            arrow_right
                            </span></a>
                    </div>
                    <hr/>
                    <ul class="product_list_wrap">
                        <li class="product_list_title_wrap">
                            <ul class="list_title order_list_title">
                                <li class="order_num_title">주문번호</li>
                                <li class="order_his_title">주문내역</li>
                                <li class="order_state_title">주문상태</li>
                                <li class="order_price_title">금액</li>
                                <li class="order_date_title">일시</li>
                            </ul>
                        </li>

                        <tr>
                            <td colspan="10" class="text_ac">
                                데이터가 없습니다.
                            </td>
                        </tr>
                    </ul>
                </div>
            </div>
            <div class="service_container">
                <div class="inquiry_container">
                    <div class="product_title_wrap">
                        <div>
                            <h3>상품문의</h3>
                        </div>
                        <a href="/inquiry/inquiry" class="product_btn">전체 보기 <span class="material-icons-outlined">
                            arrow_right
                            </span></a>
                    </div>
                    <hr/>
                    <ul class="product_list_wrap">
                        <li class="product_list_title_wrap inquiry_list_title_wrap">
                            <ul class="list_title inquiry_list_title">
                                <li>상품</li>
                                <li>제목</li>
                                <li>일시</li>
                                <li>답변여부</li>
                            </ul>
                        </li>

                        <li>
                            데이터가 없습니다.
                        </li>
                    </ul>
                </div>
                <div class="faq_container">
                    <div class="product_title_wrap">
                        <div>
                            <h3>1:1 문의</h3>
                        </div>
                        <a href="/inquiry/faq" class="product_btn">전체 보기 <span class="material-icons-outlined">
                            arrow_right
                            </span></a>
                    </div>
                    <hr/>
                    <ul class="product_list_wrap faq_list_wrap">
                        <li class="product_list_title_wrap">
                            <ul class="list_title faq_list_title">
                                <li>제목</li>
                                <li>일시</li>
                                <li>답변여부</li>
                            </ul>
                        </li>

                        <li>
                            데이터가 없습니다.
                        </li>

                    </ul>
                </div>
            </div>
        </section>
    </main>
@endsection
