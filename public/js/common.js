$(function() {
	$('body').on('focus', 'input', function() {
		$('input').attr('autocomplete','off');
	});
    $('input[readonly]').css('background', '#efefef');

	/*$('body').on('click', 'div.ipt', function() {
		if ( !!$(this).children('input').length ) return false;
		var _this = $(this),
			$no = _this.children('.no');
			chk = $no.text().trim(),
			cls = _this.prop('class').split(' '),
            el = '<input type="text" name="' + cls[2] + '" class="form-input" value="' + chk +'">',
            elVal = '',
			prev_room = '',
			after_room = '';

		$no.hide();
		_this.append(el);
		_this.find('.form-input').focus();
        _this.find('.form-input').on('change', function() {
			prev_room = $no.text($(this).val());

			if(cls[3] == 'room-assign-all') {
				after_room	= $('input[name='+ cls[2] +']').val();

				if(prev_room == after_room) {
					//_this.find('.form-input').remove();
				} else {
					ipt.assign_chk(cls[2]);
				}
			} else if(cls[3] == 'extension') {
				ipt.extension(cls[2]);

				elVal = _this.find('.form-input').val();
				$('div.' + cls[2]).text(addCommas(elVal));
			} else if(cls[3] == 'rsv-stay') {
				elVal = _this.find('.form-input').val();
				ipt.stay_chk(cls[2], elVal);
			}

			$no.show();
			$(this).remove();
		});
		_this.find('.form-input').on('blur', function() {
			if(cls[3] == 'rsv-stay') {
				console.log()
			}
			$no.show();
			$(this).remove();
		});

		_this.find('.form-input').on('keydown', function(e) {
            var code = e.which? e.which : e.keyCode;
            if (code == 13) {
				console.log(prev_room);
            }
        });
    });*/

    $('body').on('click', 'div.cal', function() {
        if(!!$(this).children().children('input').length)  return false;

        target1 = $(this).children('.txt1');
        target2 = $(this).children('.txt2');
        val = target1.text().trim();

        txt = '<span class=\'cal-box cal-temp\'>';
        txt+= '<input type=\'text\' class=\'appe-reset inp-cal calendar\' value=\'' + val + '\'>';
        txt+= '<span class=\'i-cal\'><img src=\'/img/icon/cal.png\'></span>';
        txt+= '</span>';

        $('.cal-temp').remove();
        $('.txt1').show();
        $('.txt2').show();

        target1.hide();
        target2.hide();
        $(this).append(txt);

        $('.calendar').datepicker({
            minDate: 0,
            dateFormat: 'yy-mm-dd',
            onClose: function(date) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: '/common/ajax/calendar',
                    data: 'date=' + date,
                    success: function (r) {
                        var data = $.parseJSON(r);

                        target1.text(data.txt1);
                        target2.text(data.txt2);
                    }
                });

                target1.show();
                target2.show();
                $(this).parent().remove();
            }
        });
    });

    $('body').on('click', 'div.str', function() {
        if(!!$(this).children().children('input').length)  return false;

        target = $(this).children('.str1');
        val = target.text().trim();

        txt = '<span class=\'str-temp\'>';
        txt+= '<input type=\'text\' id=\'name\' class=\'form-input\' value=\'' + val + '\'>';
        txt+= '</span>';

        $('.str-temp').remove();
        $('.str1').show();

        target.hide();
        $(this).append(txt);

        $(this).find('.form-input').focus();
        $(this).find('.form-input').on('change', function() {

        });

        $(this).find('.form-input').on('blur', function() {

        });

    });

	$('body').on('focus', 'input.date-ui, input#sdate, input#edate, input.calendar', function() {
        datePick();
    });

    $('body').on('click', '.grid-wrap .grid-area table tr', function() {
        $(this).toggleClass('active').siblings().removeClass('active');
    });

    quickMenuPop();
});

function datePick() {
    $.datepicker.setDefaults({
        dateFormat: 'yy-mm-dd',
        prevText: '이전 달',
        nextText: '다음 달',
        monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
        dayNames: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
        dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
        showMonthAfterYear: true,
        yearSuffix: '년'
    });
	$( "input.date-ui" ).datepicker({
		dateFormat: 'yy-mm-dd'
    });
    $('#sdate').datepicker({
		minDate: 0,
		onSelect: function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

			$.ajax({
				type: 'post',
                url: '/common/ajax/date',
				data: 'sdate=' + this.value + '&edate=' + $('#edate').val() + '&room=' + $('#room').val(),
				success: function(r) {
                    var data = $.parseJSON(r);

					r_rate1 = data.rate;
					r_rate2 = removeCommas($('#r-rate2').val());
					r_rate3 = removeCommas($('#r-rate3').val());

					total	= addCommas(parseInt(r_rate1) + parseInt(r_rate2) + parseInt(r_rate3));

					$('#r-rate1').val(addCommas(r_rate1));
					$('#rate').val(total);
					$('input[name=nights]').val(data.day);
					$('input[name=info-r]').val(data.info);

					if(data.day < 1)		$('input[name=rent]').prop('checked', true);
					else			    	$('input[name=rent]').prop('checked', false);
				}
			});
		},

		onClose: function(selectedDate) {
			$('#edate').datepicker('option', 'minDate', selectedDate);
		}
	});
	$('#edate').datepicker({
		minDate: 0,
		onSelect: function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

			$.ajax({
                type: 'post',
                url: '/common/ajax/date',
                data: 'sdate=' + $('#sdate').val() + '&edate=' + this.value + '&room=' + $('#room').val(),
                success: function(r) {
                    var data = $.parseJSON(r);

                    r_rate1 = data.rate;
                    r_rate2 = removeCommas($('#r-rate2').val());
                    r_rate3 = removeCommas($('#r-rate3').val());

                    total	= addCommas(parseInt(r_rate1) + parseInt(r_rate2) + parseInt(r_rate3));

                    $('#r-rate1').val(addCommas(r_rate1));
                    $('#rate').val(total);
                    $('input[name=nights]').val(data.day);
                    $('input[name=info-r]').val(data.info);

                    if(data.day < 1)		$('input[name=rent]').prop('checked', true);
                    else		    		$('input[name=rent]').prop('checked', false);
                }
			});
		},

		onClose: function( selectedDate ) {
			$('#sdate').datepicker('option', 'maxDate', selectedDate);
		}
	});
}

function addCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function removeCommas(x) {
    if(!x || x.length == 0) return "";
    else return x.split(",").join("");
}

function quickMenuPop() {
    // 룹 별 마우스 우측 클릭시
    var menuIdx = 0,
        lnb = $('.lnb');
    lnb.find(".menu > li").on('mousedown', function(e) {
        if (  (event.button == 2) || (event.which == 3) ) {
            // console.log('마우스 오른쪽 클릭 사용 x')
            menuIdx = $(this).index();
            //console.log(menuIdx);
            lnb.on('contextmenu', function() {
                return false;
            });
            var posTop = e.clientY,
                posLeft = e.clientX;
            if ( (posTop + $('.qm-pop').outerHeight() ) > $(window).height() ) {
                posTop = posTop - $('.qm-pop').outerHeight();
                $('.qm-pop').css({
                    "left": posLeft,
                    "top": posTop,
                    "position": "fixed"
                }).show();
            } else {
                $('.qm-pop').css({
                    "left": posLeft,
                    "top": posTop,
                    "position": "fixed"
                }).show();
            }
        }
    });
    // 상태 팝업 클릭시
    $('.qm-pop .qm-list > li').on('click', function(e) {
        // room.status(roomNo, $(e.target).attr('class'));
        if( $(this).attr('ref') == 'deleteAll' ) {
            page.favorites(3, '', '');
        } else  {
            page.favorites(2, menuIdx, '');
        }
        $(this).closest('.qm-pop').hide();
    });

    // 팝업 영역 제외 클릭 시 사라짐
    $(document).on('click', function(e){
        if ( !$(e.target).is('.qm-pop .qm-list > li') ) {
            $('.qm-pop').hide();
        }
    });

}

var page = {
    layer: function(a, b, c) {
        chk = $('.pop-container').length;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            url: '/layer',
            data: 'a=' + a + '&b=' + b + '&c=' + c,
            success: function(r) {
                $('#layer').html(r);
                //console.log(r);
            }
        });
    },

    layer2: function(a, b, c) {
        $.ajax({
            type: 'post',
            url: '/_new/views/layer/',
            data: 'a=' + a + '&b=' + b + '&c=' + c,
            success: function(e) {
                $('#layer2').html(e);
            }
        });
    },

    close: function() {
        chk = $('.pop-container').length;

        $('.pop-container').eq(chk - 1).remove();
    },

    loading: function(e) {
        if(e == 1) {
            $('.lds-mask').show();
        } else {
            $('.lds-mask').hide();
        }
    },

    favorites: function(a, b, c) {
        $.ajax({
            headers: {"X-CSRF-TOKEN": $("meta[name=csrf-token]").attr("content")},
            type: 'post',
            url: '/ajax/favorites/',
            data: 'a=' + a + '&b=' + b + '&c=' + c,
            success: function(r) {
                location.reload();
            }
        });
    },

    move: function(e) {
        $.ajax({
            type: 'post',
            url: '/inc/state.php',
            data: 'mode=login&log=move&a=' + e,
            success: function(r) {
                location.reload();
            }
        });
    }
}

var common = {
    all: function(a) {
        var chk	= $('#' + a).prop('checked');

        if(chk)         $('.' + a).prop('checked', true);
        else            $('.' + a).prop('checked', false);
    },

    cmt: function() {
        if(!$('input[name=cmt]').val()) {
            alert('내용을 입력해주세요.');
            $('input[name=cmt]').focus();
            return;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            data: $('#cmt').serialize(),
            url: '/ajax/cmt',
            success: function(r) {
                $('#cmt-list').html(r);
            }
        });
    },

    cmt2: function() {
        if(!$('textarea[name=cmt]').val()) {
            alert('내용을 입력해주세요.');
            $('textarea[name=cmt]').focus();
            return;
        }

        bid = $('input[name=bid]').val();
        brd = $('input[name=brd]').val();
        cmt = $('textarea[name=cmt]').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            data: 'bid=' + bid + '&brd=' + brd + '&cmt=' + cmt,
            url: '/ajax/cmt',
            success: function(r) {
                page.layer('info', 'rent', r);
            }
        });
    },

    del: function(a, b) {
        if(confirm('삭제하시겠습니까?') == true) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'delete',
                data: 'a=' + a +'&b=' + b,
                url: '/ajax/cmt/del',
                success: function(r) {
                    $('#cmt-list').html(r);
                }
            });
        }
    },

    sel: function () {
        var idx = Array();
        var cnt = 0;
        var box = $('.chk');

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

    search: function(a) {
        $('#' + a).attr('action', '').submit();
    }
}

var adm = {
    user: function() {
        if(!$('input[name=user_name]').val()) {
            alert('이름을 입력해주세요.');
            $('input[name=user_name]').focus();
            return;
        }

        if(!$('input[name=user_phone]').val()) {
            alert('연락처를 입력해주세요.');
            $('input[name=user_phone]').focus();
            return;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'post',
            data: $('#user').serialize(),
            url: '/ajax/uinfo',
            success: function(r) {
                alert('수정되었습니다.');
                page.close();
                page.layer('uinfo', 'adm', r);
            }
        });

    }
}

var excel = {
    export: function(a) {
        $('#' + a).attr('action', '/exportExcel/' + a).submit();
    }
}



