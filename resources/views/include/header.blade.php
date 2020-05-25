<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-light border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal"><img src="{{ URL::asset('/storage/cta-logo.png') }}"></h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="btn btn-dark" href="{{ route('home') }}">Главная</a>
        <a class="btn btn-dark" href="{{ route('contacts') }}">Контакты</a>
        <a class="btn btn-dark" href="{{ route('about') }}">О нас</a>
        <a class="btn btn-dark" href="{{ route('basket') }}">Корзина</a>
    </nav>
    <a class="btn btn-primary" href="#">Войти</a>
</div>
