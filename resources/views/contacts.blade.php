@extends('layouts/main')

@section('title-block', 'Контакты')

@section('content')
    <div class="pl-4">
        <h2 class="text-justify font-weight-bold">Наши контакты</h2>
        <div class="list-group">
            <h5 class="text-justify font-weight-bold">Мобильные телефоны</h5>
            <p><a href="tel:+380952256060" class="list-group-item list-group-item-action">+38(095)225-60-60</a></p>
            <p><a href="tel:+380983516928" class="list-group-item list-group-item-action">+38(098)351-69-28</a></p>
        </div>
        <br>

        <div>
            <div>
                <h5 class="text-justify font-weight-bold">СТО расположено по адресу: Запорожье, улица Гончарова, 24</h5>
                <p>Время работы</p>
                <p>Пн — Вс: с 08:00 до 18:00</p>
            </div>
            <div class="text-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10713.640450440827!2d35.1748906!3d47.8316478!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5fd1d3dd176ee590!2z0JDQstGC0L7RgNCw0LfQsdC-0YDQutCw!5e0!3m2!1sru!2sua!4v1589616984483!5m2!1sru!2sua"
                        width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                        aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
@endsection
