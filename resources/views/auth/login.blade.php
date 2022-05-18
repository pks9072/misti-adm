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
    <script src="{{ asset('js/app.js') }}" defer></script>
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

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row">
                <span class="material-icons-outlined"> person_outline </span>
                {{--<input type="text" name="mt_id" id="mt_id" placeholder="아이디" required />--}}

                <input id="uid" type="uid" class="form-control @error('uid') is-invalid @enderror" name="email" value="{{ old('uid') }}" required autocomplete="uid" autofocus>
            </div>
            <div class="row">
                <span class="material-icons-outlined"> lock </span>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            </div>
            @error('password')
            <p class="wrong">{{ $message }}</p>
            @enderror

            <div class="row button">
                <input type="submit" value="로그인"/>
            </div>
        </form>
    </div>
</body>
</html>
