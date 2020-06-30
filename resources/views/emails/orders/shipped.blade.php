@component('mail::message')
# Hola, quería pedirte:

| # | Producto | Cantidad |
|---|----------|----------|
@foreach ($order->products as $i=>$productOrder)
  | {{$i}} | {{$productOrder->product->name ?? ''}} | {{ $productOrder->accepted_amount ?? '' }} |
@endforeach



{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Gracias,<br>
{{ config('app.name') }}
@endcomponent
