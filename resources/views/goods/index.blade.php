@extends("layouts.adm")

@section("contents")
    <main class="main">
        <section>
            <div class="content_container">
                <div class="content_title_wrap">
                    <h3>상품 리스트</h3>
                </div>
                <hr/>
                <form id="goods-list">
                    <table class="item_table">
                        <colgroup>
                            <col style="width:10%"/>
                            <col style="width:90%"/>
                        </colgroup>
                        <tbody>
                        <tr>
                            <td class="table_c text_ac">상품명</td>
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

            <button class="category_btn" onclick="search('goods-list')">검색</button>

            <div class="content_container product_info_container mt_l">
                <div class="content_title_wrap">
                    <h3>총 {{ number_format($list->total()) }}개</h3>
                    <div class="flex">
                        <button class="content_btn mr_m" type="button" onclick="location.href='{{ route("brand.create") }}'">신규등록</button>
                    </div>
                </div>
                <hr />
                <table class="item_table">
                    <colgroup>
                        <col style="width:3%" />
                        <col style="width:6%" />
                        <col style="width:9%" />
                        <col style="width:30%" />
                        <col style="width:8%" />
                        <col style="width:8%" />
                        <col style="width:8%" />
                    </colgroup>
                    <tbody>
                    <tr>
                        <td class="table_c text_ac"><input type="checkbox"></td>
                        <td class="text_ac table_c br_r">번호</td>
                        <td class="text_ac table_c br_r">이미지</td>
                        <td class="text_ac table_c br_r">상품명</td>
                        <td class="text_ac table_c br_r">정상가</td>
                        <td class="text_ac table_c br_r">할인가</td>
                        <td class="text_ac table_c br_r">판매가</td>
                        <td class="text_ac table_c br_r">등록일</td>
                        <td class="text_ac table_c br_r">상태</td>
                        <td class="text_ac table_c">관리</td>
                    </tr>
                    @php($c = $list->total() - ($list->perPage() * ($list->currentPage() - 1)))
                    @forelse($list as $row)
                        @php($img = json_decode($row->images, true))
                        <tr>
                            <td class="text_ac"><input type="checkbox"></td>
                            <td class="text_ac br_r">{{ $c }}</td>
                            <td class="text_ac br_r"><img src="{{ $img["thumb"] }}" width="100" height="100"></td>
                            <td class="text_al br_r">
                                <span style="color: #10a9f8; font-size:13px">[{{ $row->brand->bname_k }} {{ !empty($row->brand->bname_e) ? "(".$row->brand->bname_e.")" : "" }}]</span> - <span style="font-size: 13px">{{ $row->affiliate->aname }}</span><br>
                                {{ $row->name }}<br>
                                <span style="color: grey; font-size: 11px">{{ $row->section->sname }} >> {{ $row->division->dname }} >> {{ $row->grp->gname }}</span>
                            </td>
                            <td class="text_ar br_r">{{ number_format($row->normal_price) }}</td>
                            <td class="text_ar br_r">{{ number_format($row->sale_price) }}</td>
                            <td class="text_ar br_r">{{ number_format($row->price) }}</td>
                            <td class="text_ac br_r">{{ $row->created_at }}</td>
                            <td class="text_ac br_r red_c">{{ ($row->state == 1) ? "노출" : "비노출" }}</td>
                            <td class="text_ac">
                                <button class="product_info_btn" onclick="location.href='{{ route("brand.edit", $row->id) }}'">수정</button>
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
