var basic = {
    add: function() {
        if(!$('input[name=name]').val()) {
            alert('제휴사명을 입력해주세요.');
            $('input[name=name]').focus();
            return;
        }

        if(!$('input[name=ceo]').val()) {
            alert('대표자명을 입력해주세요.');
            $('input[name=ceo]').focus();
            return;
        }

        if(!$('input[name=tel]').val()) {
            alert('연락처를 입력해주세요.');
            $('input[name=tel]').focus();
            return;
        }

        page.loading(1);

        $('#info').submit();
    }
}

var brand = {
    add: function() {
        if(!$('input[name=name]').val()) {
            alert('제조사명을 입력해주세요.');
            $('input[name=name]').focus();
            return;
        }

        page.loading(1);

        $('#brand').submit();
    },

    brand: function(a, b) {
        url = window.location.pathname
        exp = /\/carmodel/;
        check = exp.test(url);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            data: 'a=' + a + '&b=' + b,
            url: '/ajax/vehicle/brand',
            success: function(r) {
                vehicle.vehicle('', '');
                $('select[name=brand_id]').empty();
                $('select[name=brand_id]').append(r);

                if(check) {
                    $('.chk').prop({'checked': false, 'diabled': check});
                }
            }
        });
    }
}

var vehicle = {
    add: function() {
        if(!$('select[name=b_type]').val()) {
            alert('분류를 선택해주세요.');
            $('select[name=b_type]').focus();
            return;
        }

        if(!$('select[name=brand_id]').val()) {
            alert('제조사를 선택해주세요.');
            $('select[name=brand_id]').focus();
            return;
        }

        if(!$('input[name=vehicle]').val()) {
            alert('모델명을 입력해주세요.');
            $('input[name=vehicle]').focus();
            return;
        }

        chk = common.sel();

        if (chk < 1) {
            alert('차종을 1개이상 선택해주세요.');
            return;
        }

        page.loading(1);

        $('#vehicle').submit();
    },

    vehicle: function(a, b) {
        url = window.location.pathname
        exp = /\/carmodel/;
        check = exp.test(url);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            data: 'a=' + a + '&b=' + b,
            url: '/ajax/vehicle/vehicle',
            success: function(r) {
                $('select[name=vehicle_id]').empty();
                $('select[name=vehicle_id]').append(r);

                if(check) {
                    $('.chk').prop({'checked': false, 'diabled': check});
                }
            }
        });
    }
}

var models = {
    add: function() {
        if(!$('select[name=b_type]').val()) {
            alert('분류를 선택해주세요.');
            $('select[name=b_type]').focus();
            return;
        }

        if(!$('select[name=brand_id]').val()) {
            alert('제조사를 선택해주세요.');
            $('select[name=brand_id]').focus();
            return;
        }

        if(!$('select[name=vehicle_id]').val()) {
            alert('모델명을 선택해주세요.');
            $('select[name=vehicle_id]').focus();
            return;
        }

        if(!$('input[name=model]').val()) {
            alert('세부 모델명을 입력해주세요.');
            $('input[name=model]').focus();
            return;
        }

        if(!$('input[name=year]').val()) {
            alert('연식을 입력해주세요.');
            $('input[name=year]').focus();
            return;
        }

        chk = common.sel();

        if (chk < 1) {
            alert('차종을 1개이상 선택해주세요.');
            return;
        }

        page.loading(1);

        $('#models').submit();
    },

    vtype: function(a) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            data: 'a=' + a,
            url: '/ajax/vehicle/carmodel/vtype',
            success: function(r) {
                //console.log(r);
                $('#v_type').html(r);
            }
        });
    },

    select: function(a, b, c, d) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            data: 'a=' + a + '&b=' + b + '&c=' + c + '&d=' + d,
            url: '/ajax/vehicle/carmodel/select',
            success: function(r) {
                var data = $.parseJSON(r);

                $('select[name=brand_id]').empty();
                $('select[name=brand_id]').append(data.opt1);
                $('select[name=vehicle_id]').empty();
                $('select[name=vehicle_id]').append(data.opt2);
                $('select[name=carmodel_id]').empty();
                $('select[name=carmodel_id]').append(data.opt3);
            }
        });
    },

    models: function(a, b) {
        url = window.location.pathname
        exp = /\/carmodel/;
        check = exp.test(url);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            data: 'a=' + a + '&b=' + b,
            url: '/ajax/vehicle/carmodel/motor',
            success: function(r) {
                $('select[name=carmodel_id]').empty();
                $('select[name=carmodel_id]').append(r);

                if(check) {
                    $('.chk').prop({'checked': false, 'diabled': check});
                }
            }
        });
    }


}

var shop = {
    add: function() {
        if(!$('select[name=b_type]').val()) {
            alert('분류를 선택해주세요.');
            $('select[name=b_type]').focus();
            return;
        }

        if(!$('select[name=brand_id]').val()) {
            alert('제조사를 선택해주세요.');
            $('select[name=brand_id]').focus();
            return;
        }

        if(!$('select[name=vehicle_id]').val()) {
            alert('모델명을 선택해주세요.');
            $('select[name=vehicle_id]').focus();
            return;
        }

        if(!$('select[name=carmodel_id]').val()) {
            alert('세부 모델명을 선택해주세요.');
            $('select[name=carmodel_id]').focus();
            return;
        }

        if(!$('input[name=deposit]').val()) {
            alert('보증금을 입력해주세요.');
            $('input[name=deposit]').focus();
            return;
        }

        if(!$('input[name=price]').val()) {
            alert('정상가를 입력해주세요.');
            $('input[name=price]').focus();
            return;
        }

        if(!$('input[name=sale]').val()) {
            alert('선수금을 입력해주세요.');
            $('input[name=sale]').focus();
            return;
        }

        page.loading(1);

        $('#shop').submit();
    },

    del: function(a) {
        if (confirm('선택하신 목록을 삭제하시겠습니까?') == true) {
            page.loading(1);

            $('input[name=id]').val(a);
            $('#del').attr('action', '/shop/').submit();
        }
    }
}

var mem = {
    add: function() {
        if(!$('input[name=name]').val()) {
            alert('이름을 입력해주세요.');
            $('input[name=name]').focus();
            return;
        }

        if(!$('input[name=phone]').val()) {
            alert('연락처를 입력해주세요.');
            $('input[name=phone]').focus();
            return;
        }

        page.loading(1);

        $('#member').submit();
    }
}
