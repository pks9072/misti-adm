function go_validation_event()
{

	var mt_id = $("#mt_id").val();
	var mt_pwd = $("#mt_pwd").val();

     // 값이 유효성 검사
     if( mt_id.length < 1 )
     {
          alert("아이디를 입력해주세요.");
          return false;
     }

     if( mt_pwd.length < 1 )
     {
          alert("비밀번호를 입력해주세요.");
          return false;
     }

     $(".wrong").hide();

	// ajax 아이디 확인 및 비밀번호 확인

	$.ajax({
          //아래 headers에 반드시 token을 추가해줘야 한다.!!!!! 
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          type: 'post',
          url: '/login/validation',
          dataType: 'json',
          data: { "mt_id":mt_id,"mt_pwd":mt_pwd },
          success: function(data) {

                 if(data.status=='wrong'){
                    $(".wrong").show();
                    return false;
                 }else{
                    $("#login_form").submit();
                 }
                 console.log(data);
                 return false;
          },
          error: function(data) {
            console.log("error" +data);
          }
	});

	
}

$(document).ready(function() {

    $("#mt_pwd").keydown(function(e) {

        if(e.which == 13) {
            // enter pressed
            go_validation_event();
        }
    });

});