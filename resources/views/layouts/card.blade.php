<div class="col-sm-6 col-md-4 text-center mb-3">
    <div class="thumbnail">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">{{ $product->name }}</h4>
        </div>

        <div class="caption">
            <h1 class="card-title pricing-card-title">
                <img width="100%" src="{{ Storage::url( $product->image) }}" alt="Фото товара">
            </h1>
            <ul class="list-unstyled mt-3 mb-4">
                <li>Цена: {{ $product->price }} грн.</li>
                <li>{{ $product->description }}</li>
            </ul>

            <form action="{{ route('basket-add', $product) }}" method="POST">
                <!-- форма передается в метод basket-add с id продукта -->
                @csrf
                <button type="submit" class="btn btn-lg btn-block btn-outline-primary">В корзину</button>
                <a class="btn btn-lg btn-block btn-outline-dark"
                   href="{{ route('product', [$product->category->code, $product->code]) }}">Подробнее</a>
            </form>

        </div>
    </div>
</div>

