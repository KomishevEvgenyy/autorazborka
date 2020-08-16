<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, min-height=device-height, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="description" content="Постоянно в наличии огромный выбор качественных оригинальных и неоригинальных, б/у и новых запчастей для автомобилей марки ВАЗ ЗАЗ Daewoo ДЕО ГАЗ Таврия Москвич">
    <meta name="keywords" content="авторазборка Daewoo, авторазборка ДЕО, авторазборка ГАЗ, авторазборка ВАЗ, авторазборка ЗАЗ, авторазборка Таврия, авторазборка Москвич,
   разборка Daewoo, разборка ДЕО, разборка ГАЗ, разборка ВАЗ, разборка ЗАЗ, разборка Таврия, разборка Москвич,
   детали Daewoo, детали ДЕО, детали ГАЗ, детали ВАЗ, детали ЗАЗ, детали Таврия, детали Москвич,
   б/у запчасти Daewoo, б/у запчасти ДЕО, б/у запчасти ГАЗ, б/у запчасти ВАЗ, б/у запчасти ЗАЗ, б/у запчасти Таврия, б/у запчасти Москвич,
   б/у резина, Запорожье, Украина"/>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ URL::asset('/storage/icons.png') }}">
    <style>
        * {
            font-family: "Montserrat";
            margin: 0;
            padding: 0;
        }

        html, body {
            height: 100%;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .index-content {
            flex: 1 0 auto;
        }

        .index-footer {
            flex: 0 0 auto;
        }

        .card-div-position-relative {
            position: relative;
            width: 100%;
            height: 500px;
        }

        .card-div-position-absolute {
            position: absolute;
            bottom: 5px;
            left: 0;
            right: 0;
            width: 100%;
            padding: 0 5px 0 5px;
        }

        .bg-color-btn-header-black {
            background-color: #000000;
        }

        .bg-color-btn-header-red {
            background-color: #e83223;
        }
    </style>
    <title> Авторазборка Запорожье - @yield('title-block')</title>
</head>
<body>
    <div class="wrapper bg-white">
        <div class="index-content">
            @include('include.header')
            @include('include.navbar')
            <div class="container">
                <div class="starter-template">
                    @if(session()->has('success'))
                        <p class="alert alert-success">{{ session()->get('success') }}</p>
                    @endif
                    @if(session()->has('error'))
                        <p class="alert alert-error">{{ session()->get('error') }}</p>
                    @endif
                    @yield('content')
                </div>
            </div>
            @yield('index')
        </div>
        <div class="index-footer">
            @include('include.footer')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
