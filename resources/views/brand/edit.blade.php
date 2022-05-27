@extends("layouts.adm")

@section("contents")
    <main class="main">
        <section>
            <div class="content_container">
                <div class="content_title_wrap">
                    <h3>브랜드 수정</h3>
                </div>
                <hr/>
                <form id="brand" method="put" action="{{ route("brand.update", $row[0]->id) }}">
                    @csrf
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
                                    <input type="text" name="bname_k" class="table_input" value="{{ $row[0]->bname_k }}">
                                </div>

                                @error("bname_k")
                                <div>
                                    {{ $message }}
                                </div>
                                @enderror

                            </td>
                        </tr>
                        <tr>
                            <td class="table_c text_ac">브랜드명 (영문)</td>
                            <td class="text_al">
                                <div class="flex flex_a_c">
                                    <input type="text" name="bname_e" class="table_input" value="{{ $row[0]->bname_e }}">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="table_c text_ac">상태</td>
                            <td class="text_al flex flex_a_c cate_line">
                                <div class="flex flex_a_c mr_l">
                                    <input type="radio" name="state" id="s1" class="mr_s" value="1" {{ ($row[0]->state == 1) ? "checked" : "" }}>
                                    <label for="s1">노출</label>
                                </div>
                                <div class="flex flex_a_c mr_l">
                                    <input type="radio" name="state" id="s99" class="mr_s" value="99" {{ ($row[0]->state == 99) ? "checked" : "" }}>
                                    <label for="s99">비노출</label>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>

            <div class="flex flex_jc mt_l" style="margin-bottom: 20px">
                <button class="product_list_btn mr_m" onclick="$('#brand').submit()">수정</button>
                <button class="product_list_btn pr_cancel" onclick="location.href='{{ route("brand.index") }}'">목록</button>
            </div>
        </section>
    </main>
@endsection

@section("script")
    <script src="{{ mix('js/brand.js') }}"></script>
@endsection
