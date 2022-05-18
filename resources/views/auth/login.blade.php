<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="ko" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>살구마켓 관리자</title>
    <link rel="stylesheet" href="{{ asset('common/css/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('common/css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet"
    />
</head>
<body>
<div class="container">
    <div class="wrapper">
        <div class="title" style="color:#fff; font-size: 35px">
            {{--<img src="/img/logo_white.svg" alt="logo" class="logo" />--}}
            {{ config("app.name")  }}
        </div>
        <div class="subtitle">
            <h3>로그인</h3>
        </div>

        <form action="/login/proc" id="login_form" method="POST">
            @csrf
            <input type="hidden" name="check_form" value="sal9">
            <div class="row">
                <span class="material-icons-outlined"> person_outline </span>
                <input type="text" name="mt_id" id="mt_id" placeholder="아이디" required />
            </div>
            <div class="row">
                <span class="material-icons-outlined"> lock </span>
                <input type="password" name="mt_pwd" id="mt_pwd" placeholder="비밀번호" required />
            </div>
            <p class="wrong">아이디 또는 비밀번호가 틀렸습니다.</p>
            <div class="row button">
                <input type="button" value="로그인" onclick="javascript:go_validation_event();"/>
            </div>
        </form>
    </div>
</body>
</html>
<script type="text/javascript" src="{{ URL::asset('js/jquery-1.12.4.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/login.js') }}"></script>
