@php($css = "admin")
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config("app.name") }}</title>
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset("common/css/reset.css") }}" />
    <link rel="stylesheet" href="{{ asset("common/css/common.css") }}" />
    <link rel="stylesheet" href="{{ asset("css/".$css.".css") }}" />

    <script src="{{ asset("js/jquery-3.6.0.min.js") }}" ></script>
    <script src="{{ asset("js/admin.js") }}" defer></script>
</head>
<body>
    <section class="admin_container">
        <header>
            @include("common.left")
            @include("common.header")
        </header>


        @yield("contents")
    </section>
    <script>
        $(document).ready(function(){
            $(".more").click(function(){

                if( $(this).attr("data-id")=='1')
                {

                }else{

                    $(".more").attr("data-id","0");
                    $(this).attr("data-id","1");
                    $(".hidden_list").removeClass("show");
                    $(this).find(".hidden_list").addClass("show");
                }
            });
        });
    </script>
</body>
</html>
