@extends('layouts.main')

@section('title-block', 'Главная')

@section('index')
    <div id="myCarousel" class="carousel slide mt-1" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item">
                <img src="{{ URL::asset('/storage/home1-slide1.jpg') }}"
                     alt="Выкуп и продажа б/у автомобилей Deawoo ВАЗ ГАЗ ЗАЗ Москвич Таврия" width="100%">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Выкуп и продажа б/у автомобилей</h1>
                        <p>Deawoo ВАЗ ГАЗ ЗАЗ Москвич Таврия</p>
                        <p>
                            <a class="btn btn-outline-light" href="tel:+380952256060" role="button">+380952256060</a>
                            <a class="btn btn-outline-light" href="tel:+380983516928" role="button">+380983516928</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item active">
               <img src="{{ URL::asset('/storage/home2-slide1.jpg') }}" alt="Услуги эвакуатора Ремонт автомобилей" width="100%">
                <div class="container">
                    <div class="carousel-caption">
                        <h1 class="text-light">Услуги эвакуатора</h1>
                        <p class="text-white">Ремонт автомобилей</p>
                        <p>
                            <a class="btn btn-secondary" href="tel:+380952256060" role="button">+380952256060</a>
                            <a class="btn btn-secondary" href="tel:+380983516928" role="button">+380983516928</a>
                        </p>
                    </div>
                </div>
            </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="my-0">
        <img src="{{ URL::asset('/storage/whyus-bg1.jpg') }}" width="100%">
    </div>
        <div class="my-0">
            <h3 class="text-center">Услуги эвакуатора</h3>
            <img src="{{ URL::asset('/storage/whyus-bg.jpg')}}" width="100%">
        </div>
@endsection
