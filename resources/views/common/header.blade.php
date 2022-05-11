<meta http-equiv='X-UA-Compatible' content='IE=Edge'>
<meta charset='UTF-8'>
<meta name='description' content='description'>
<meta name='keywords' content='{{ config('app.name') }}'>
<meta name='author' content='author'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<meta name='csrf-token' content='{{ csrf_token() }}'>
<title>카이지 관리자</title>
<meta property='og:locale' content='ko_KR'>
<meta property='og:type' content='website'>
<meta property='og:title' content='{{ config('app.name') }}'>
<meta property='og:image' content=''>
<meta property='og:description' content=''>
<meta property='og:url' content=''>
<meta property='og:site_name' content='{{ config('app.name') }}'>
<meta name='twitter:title' content='{{ config('app.name') }}'>
<meta name='twitter:card' content='summary'>
<meta name='twitter:image' content=''>
<meta name='twitter:description' content=''>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('fonts/nanumgothic/nanumgothic.css') }}">
<link rel="stylesheet" href="{{ asset('fonts/notosanskr/notosanskr.css') }}">
<link rel='stylesheet' href="{{ asset('css/reset.css') }}">
<link rel='stylesheet' href="{{ asset('css/jquery-ui-1.12.1.min.css') }}">
<link rel='stylesheet' href="{{ asset('css/common.css') }}">
<link rel='stylesheet' href="{{ asset('css/winpop/winpop.css') }}">
<link rel='stylesheet' href="{{ asset('css/include/pop.css') }}">
<link rel='stylesheet' href="{{ asset('css/'.$page.'/init.css') }}">
<script src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui-1.12.1.min.js') }}"></script>
<script src="{{ asset('js/common.js?v=').time() }}"></script>
<script src="{{ asset('js/'.$page.'/init.js?v=').time() }}"></script>

<!--[if lt IE 9]>
<script type='text/javascript' src='//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
<![endif]-->
