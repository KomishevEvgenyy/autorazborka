<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-light border-bottom shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal"><img src="{{ URL::asset('/storage/cta-logo.png') }}"></h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="btn btn-dark @routeactive('index')"  href="{{ route('index') }}">Главная</a>
        <a class="btn btn-dark @routeactive('contacts')" href="{{ route('contacts') }}">Контакты</a>
        <a class="btn btn-dark @routeactive('about')" href="{{ route('about') }}">О нас</a>
        <a class="btn btn-dark @routeactive('basket*')" href="{{ route('basket') }}">Корзина</a>
    </nav>
    @guest
        <a class="btn btn-primary" href="{{ route('login') }}">Войти</a>
    @endguest
    @auth
        <nav class="mr-md-3">
            <a class="btn btn-primary" href="{{ route('home') }}">Панель администратора</a>
            <a class="btn btn-primary" href="{{ route('logout') }}">Вийти</a>
        </nav>
    @endauth
</div>
