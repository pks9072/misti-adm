@extends("layouts.adm")

@section("contents")
    <main class="main">
        <section>
            <div class="content_container">
                <div class="content_title_wrap">
                    <h3>브랜드</h3>
                </div>
                <hr/>
                <form name="s_form" id="s_form" method="GET" action="/member/list">
                    <div class="flex pt_m pb_m flex_a_c pl_xl">
                        <div class="filter_item mr_m">
                            <select  name="item_ct" id="item_ct">
                                <option value="mt_all">전체</option>
                                <option value="mt_id">아이디</option>
                                <option value="mt_name">회원명</option>
                            </select>
                        </div>
                        <div class="flex flex_a_c">
                            <input type="text" name="stx" id="stx" class="table_input mr_s" value=">">
                            <button  type="button" class="user_btn"  onclick="javascript:go_search_event();">검색</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="content_container product_info_container mt_l">
                <div class="content_title_wrap">
                    <h3>&nbsp;</h3>
                    <div class="flex">
                        <button class="content_btn mr_m" type="button" onclick="">신규등록</button>
                        <button class="content_btn" type="button" onclick="">선택삭제</button>
                    </div>
                </div>
                <hr />
                <table class="item_table">
                    <colgroup>
                        <col style="width:6%" />
                        <col style="width:30%" />
                        <col style="width:30%" />
                        <col style="width:16%" />
                        <col style="width:10%" />
                        <col style="width:8%" />
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="table_c text_ac">번호</td>
                            <td class="text_ac table_c br_r">브랜드명</td>
                            <td class="text_ac table_c br_r">브랜드명(영문)</td>
                            <td class="text_ac table_c br_r">등록일</td>
                            <td class="text_ac table_c br_r">상태</td>
                            <td class="text_ac table_c">관리</td>
                        </tr>
                        @php($c = $list->total() - ($list->perPage() * ($list->currentPage() - 1)))
                        @forelse($list as $row)
                            <tr>
                                <td class="text_ac">{{ $c }}</td>
                                <td class="text_al br_r">{{ $row->bname_k }}</td>
                                <td class="text_al br_r">{{ $row->bname_e }}</td>
                                <td class="text_ac br_r">{{ $row->created_at }}</td>
                                <td class="text_ac br_r red_c">{{ ($row->state == 1) ? "노출" : "비노출" }}</td>
                                <td class="text_ac">
                                    <button class="event_btn_two_right" onclick="">수정</button>
                                </td>
                            </tr>
                            @php($c--)
                        @empty
                            <tr><td colspan="7" class="text_ac">데이터가 없습니다.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        {{ $list->appends(request()->query())->links() }}
    </main>
@endsection
