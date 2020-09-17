<h1>Заказ от {{ $name }}!</h1>
<p>Телефон: {{ $phone }}</p>
<p>Заказ на сумму: {{ $fullSum }} грн.</p>

<table>
    <tbody>
    @foreach($order->products as $product)
        <tr>
            <td>
                <a href=" {{ route('product', [$product->category->code, $product->code]) }} ">
                    <img height="56px" src="{{ Storage::url( $product->image) }}">
                    {{ $product->description }}
                </a>
            </td>
            <td><span class="badge">Кол-во: {{ $product->pivot->count }}</span>
            </td>
            <td>Цена: {{ $product->price }} грн.</td>
        </tr>
    @endforeach
    <td> Общая сумма: {{ $fullSum }} грн.</td>
    </tbody>
</table>
