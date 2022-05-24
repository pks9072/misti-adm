@extends("layouts.adm")

@section("contents")
    <main class="main">
        <section>
            <div class="content_container">
                <div class="content_title_wrap">
                    <h3>브랜드</h3>
                </div>
                <hr/>
                <form id="brand-list">
                    <table class="item_table">
                        <colgroup>
                            <col style="width:10%"/>
                            <col style="width:90%"/>
                        </colgroup>
                        <tbody>
                            <tr>
                                <td class="table_c text_ac">브랜드명</td>
                                <td class="text_al">
                                    <div class="flex flex_a_c">
                                        <input type="text" name="keyword" class="table_input" value="{{ $val["keyword"] }}">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="table_c text_ac">상태</td>
                                <td class="text_al flex flex_a_c cate_line">
                                    <div class="flex flex_a_c mr_l">
                                        <input type="radio" name="state" id="s-all" class="mr_s" value="" {{ (empty($val["state"])) ? "checked" : "" }}>
                                        <label for="s-all">전체</label>
                                    </div>
                                    <div class="flex flex_a_c mr_l">
                                        <input type="radio" name="state" id="s1" class="mr_s" value="1" {{ ($val["state"] == 1) ? "checked" : "" }}>
                                        <label for="s1">노출</label>
                                    </div>
                                    <div class="flex flex_a_c mr_l">
                                        <input type="radio" name="state" id="s99" class="mr_s" value="99" {{ ($val["state"] == 99) ? "checked" : "" }}>
                                        <label for="s99">비노출</label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>

            <button class="category_btn" onclick="search('brand-list')">검색</button>

            <div class="content_container product_info_container mt_l">
                <div class="content_title_wrap">
                    <h3>총 {{ number_format($list->total()) }}개</h3>
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
