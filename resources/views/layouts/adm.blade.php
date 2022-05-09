<!DOCTYPE html>
<!--[if IE 8]><html lang='ko-KR' class='no-js ie8 lt-ie10'><![endif]-->
<!--[if IE 9]><html lang='ko-KR' class='no-js ie9 lt-ie10'><![endif]-->
<!--[if !IE]><!-->
<html lang='ko-KR'>
<!--<![endif]-->
<head>
    @include('common.header')
</head>

<body class='page-{{ $page }}'>
<div class='wrapper'>
    <header class='header'>
        @include('common.gnb')
    </header>

    @include('common.left')
    @yield('content')
    @yield('script')
    <div id='layer'></div>
    <div class='cf'></div>
    <iframe id='excel_download' src='' style='display:none; visibility:hidden;'></iframe>

    <div class="lds-mask" style="display: none">
        <div class="lds-wrapper">
            <div class="lds-container">
                <div class="lds-facebook">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="lds-text">
                    Loading...
                </div>
            </div>
        </div>
    </div>
    @include('common.script')
</div>
<script>
    $(document).on("keyup", ".phone", function() {
        prev    = $(this).val();
        str     = prev.replace(/[^0-9]/g, "").replace(/(^02|^0505|^01.{1}|^0[0-9]{2})([0-9]+)?([0-9]{4})/,"$1-$2-$3").replace("--", "-");
        $(this).val(str);
    });
</script>
</body>
</html>
