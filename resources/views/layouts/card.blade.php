<div class="col-sm-6 col-md-4 text-center mb-3">
    <div class="img-thumbnail card-div-position-relative">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">{{ $product->name }}</h4>
        </div>
        <div class="caption mt-1">
            <h1 class="card-title pricing-card-title">
                <img width="100%" src="{{ URL::asset('/storage/'.$product->image) }}" alt="{{ $product->name }}">
            </h1>
        </div>
        <div class="card-div-position-absolute">
            <ul class="list-unstyled mt-1 mb-2">
                <li>Цена: {{ $product->price }} грн.</li>
            </ul>
            <form action="{{ route('basket-add', $product) }}" method="POST">
                <!-- форма передается в метод basket-add с id продукта -->
                @csrf
                @if($product->isAvailable())
                    <button type="submit" class="btn btn-lg btn-block btn-outline-primary">В корзину</button>
                @else
                    <p>Товар не доступен</p>
                @endif
                <a class="btn btn-lg btn-block btn-outline-dark"
                   href="{{ route('product', [isset($category) ? $category->code : $product->category->code, $product->code]) }}">Подробнее</a>
            </form>
        </div>
    </div>
</div>

