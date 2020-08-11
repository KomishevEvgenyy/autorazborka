<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-light border-bottom shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal"><img src="{{ URL::asset('/storage/cta-logo.png') }}"
                                                        alt="Интернет магазин б/у запчастей" title="Продажа б/у запчастей"></h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="btn btn-danger bg-color-btn-header-red @routeactive('index') my-1"  href="{{ route('index') }}">Главная</a>
        <a class="btn btn-danger bg-color-btn-header-red @routeactive('contacts') my-1" href="{{ route('contacts') }}">Контакты</a>
        <a class="btn btn-danger bg-color-btn-header-red @routeactive('about') my-1" href="{{ route('about') }}">О нас</a>
        <a class="btn btn-danger bg-color-btn-header-red @routeactive('basket*') my-1" href="{{ route('basket') }}">Корзина</a>
    </nav>
    @guest
        <a class="btn btn-dark bg-color-btn-header-black" href="{{ route('login') }}">Войти</a>
    @endguest
    @auth
        <nav class="mr-md-3">
            @if(Auth::user()->isAdmin())
                <a class="btn btn-dark bg-color-btn-header-black my-1" href="{{ route('home') }}">Панель администратора</a>
           @else
                <a class="btn btn-dark bg-color-btn-header-black my-1" href="{{ route('person.orders.index') }}">Мои заказы</a>
            @endif
            <a class="btn btn-dark bg-color-btn-header-black my-1" href="{{ route('logout') }}">Выйти</a>
        </nav>
    @endauth
</div>
