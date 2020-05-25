<div class="col-sm-6 col-md-4 text-center">
    <div class="thumbnail">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">{{ $product->part_name }}</h4>
        </div>
        <div class="caption">
            <h1 class="card-title pricing-card-title">
                <img width="340" src="{{ URL::asset('/storage/engine.jpg') }}">
            </h1>
            <ul class="list-unstyled mt-3 mb-4">
                <li>{{ $product->price }}</li>
                <li>{{ $product->description }}</li>
                <li>{{ $product->vendor_code }}</li>
            </ul>
            <a href="{{ route('basket') }}" class="btn btn-lg btn-block btn-outline-primary">В корзину</a>
            {{ $product->category->brand }}
            <a class="btn btn-lg btn-block btn-outline-dark"
               href="{{ route('product', [$product->category->id, $product->category_id]) }}">Подробнее</a>
        </div>
    </div>
</div>

