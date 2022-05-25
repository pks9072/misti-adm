@extends("layouts.adm")

@section("contents")
    <main class="main">
        <section>
            <div class="content_container">
                <div class="content_title_wrap">
                    <h3>브랜드</h3>
                </div>
                <hr/>
                <form id="brand" method="post" action="{{ route("brand.store") }}">
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
                                        <input type="text" name="bname_k" class="table_input" class="@error("bname_k") is-invalid @enderror">
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
                                        <input type="text" name="bname_e" class="table_input">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="table_c text_ac">상태</td>
                                <td class="text_al flex flex_a_c cate_line">
                                    <div class="flex flex_a_c mr_l">
                                        <input type="radio" name="state" id="s1" class="mr_s" value="1" checked>
                                        <label for="s1">노출</label>
                                    </div>
                                    <div class="flex flex_a_c mr_l">
                                        <input type="radio" name="state" id="s99" class="mr_s" value="99">
                                        <label for="s99">비노출</label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            {{--@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif--}}

            <div class="flex flex_jc mt_l" style="margin-bottom: 20px">
                <button class="product_list_btn mr_m" onclick="$('#brand').submit()">등록</button>
                <button class="product_list_btn pr_cancel" onclick="location.href='{{ route("brand.index") }}'">목록</button>
            </div>
        </section>
    </main>
@endsection

@section("script")
    <script src="{{ mix('js/brand.js') }}"></script>
@endsection
