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
