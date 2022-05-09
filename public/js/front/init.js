var temps = {
    sel: function () {
        var idx = Array();
        var cnt = 0;
        var box = $('.customer');

        for (i = 0; i < box.length; i++) {
            if (box[i].checked == true) {
                idx[cnt] = box[i].value;
                cnt++;
            }
        }

        if (cnt > 0) {
            return idx;
        } else {
            return false;
        }
    },

    assign: function (a) {
        chk = temps.sel();

        if (chk < 1) {
            alert('배정할 목록을 선택해주세요.');
            return;
        } else {
            switch(a) {
                case 1:     path = 'account';               break;
                case 2:     path = 'member-normal';         break;
                case 3:     path = 'member-search';         break;
                default:    path = 'account';               break;
            }

            page.layer(path, 'customer', chk);
        }
    },

    del: function (a) {
        chk = (a < 3) ? temps.sel() : 99;
        msg = (a == 1) ? '취소' : '삭제';

        if (chk < 1) {
            alert(msg + '할 목록을 선택해주세요.');
            return;
        } else {
            if (confirm('선택하신 목록을 ' + msg + '하시겠습니까?') == true) {
                page.loading(1);

                if (a < 3) {
                    $('input[name=did]').val(chk);
                    $('input[name=type]').val(a);
                }

                $('#del').attr('action', '/rent/carminute').submit();
            }
        }
    },

    state: function (a) {
        page.loading(1);

        switch (a) {
            case 1:
                mthd = 'post';
                break;
            case 2:
                mthd = 'put';
                break;
            case 3:
                mthd = 'delete';
                break;
        }

        act = (a == 1) ? '/customer' : '/customer/' + mthd;

        $('input[name=_method]').val(mthd);
        $('#assign').attr('action', act).submit();
    },

    succ: function(a, b) {
        page.loading(1);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            data: 'a=' + a + '&b=' + b,
            url: '/ajax/temp/succ',
            success: function(r) {
                alert('"' + r +'" 상태로 변경되었습니다.');
                page.loading(2);
            }
        });
    },

    search: function() {

    }
}

var acc = {
    update: function() {
        if(!$('input[name=name]').val()) {
            alert('제휴사명을 입력해주세요.');
            $('input[name=name]').focus();
            return;
        }

        if(!$('input[name=percent]').val()) {
            alert('배정확률을 입력해주세요.');
            $('input[name=percent]').focus();
            return;
        }

        if(!$('input[name=tel]').val()) {
            alert('연락처를 입력해주세요.');
            $('input[name=tel]').focus();
            return;
        }

        $('#aform').attr('action', '/account/update').submit();
    }
}

var info = {
    save: function() {
        page.loading(1);

        var form = $('#info')[0];
        var data = new FormData(form);

        $.ajax({
            headers: {"X-CSRF-TOKEN": $("meta[name=csrf-token]").attr("content")},
            type: 'post',
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            data: data,
            url: '/customer/info',
            success: function(r) {
                page.loading(2);
                page.layer('info', 'rent', r);
            }
        });
    },

    add: function() {
        if(!$('input[name=aname]').val()) {
            alert('고객명을 입력해주세요.');
            $('input[name=aname]').focus();
            return;
        }

        if(!$('input[name=atel]').val()) {
            alert('고객 연락처를 입력해주세요.');
            $('input[name=atel]').focus();
            return;
        }

        if(!$('input[name=acar]').val()) {
            alert('문의차종을 입력해주세요.');
            $('input[name=acar]').focus();
            return;
        }

        page.loading(1);

        $('#info').submit();
    },

    member: function(a, b) {
        $.ajax({
            headers: {"X-CSRF-TOKEN": $("meta[name=csrf-token]").attr("content")},
            type: 'post',
            data: 'a=' + a + '&b=' + b,
            url: '/ajax/user',
            success: function(r) {
                $('select[name=member]').empty();
                $('select[name=member]').append(r);
            }
        });
    }
}

var searchad = {
    import: function() {
        if(!$('input[name=import_file]').val()) {
            alert('파일을 업로드해주세요.');
            return;
        }

        $('#ufiile').submit();
    },

    keyword: function() {
        if(!$('input[name=uword]').val()) {
            alert('키워드명을 입력해주세요.');
            $('input[name=uword]').focus();
            return
        }

        if(!$('input[name=upid]').val()) {
            alert('코드를 입력해주세요.');
            $('input[name=upid]').focus();
            return
        }

        if(!$('input[name=w]').val()) {
            alert('PC URL을 입력해주세요.');
            $('input[name=w]').focus();
            return
        }

        if(!$('input[name=m]').val()) {
            alert('모바일 URL을 입력해주세요.');
            $('input[name=m]').focus();
            return
        }

        $('#searchad').submit();
    },

    del: function(a) {
        if(confirm('키워드를 삭제하시겠습니까?') == true) {
            $('#del').attr('action', '/ad/' + a).submit();
        }
    }
}
