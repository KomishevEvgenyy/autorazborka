<div class="">
    <hr class="featurette-divider">
    <footer class="container py-5">
        <div class="row">
            <div class="col-12 col-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                     stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mb-2" role="img"
                     viewBox="0 0 24 24" focusable="false"><title>Product</title><circle cx="12" cy="12" r="10"></circle><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"></path></svg>
                <small class="d-block mb-3 text-muted">© 2010-{{ date('Y') }}</small>
            </div>

            <div class="col-6 col-md">
                <h5>Навигация</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="{{ route('index') }}">Главная</a></li>
                    <li><a class="text-muted" href="{{ route('contacts') }}">Контакты</a></li>
                    <li><a class="text-muted" href="{{ route('about') }}">О Нас</a></li>
                </ul>
            </div>

            <div class="col-6 col-md">
                <h5>Контакты</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="tel:+380952256060">+380952256060</a></li>
                    <li><a class="text-muted" href="tel:+380983516928">+380983516928</a></li>
                </ul>
            </div>
        </div>
    </footer>
</div>
