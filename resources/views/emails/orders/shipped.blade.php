@component('mail::message')
# Hola, quería pedirte:
@php
  $aux = 1;
@endphp
| # | Producto | Cantidad |
|---|----------|----------|
@foreach ($order->products as $i=>$productOrder)
@if ($productOrder->status->name == 'Pedido')
| {!!$aux!!} | {!!$productOrder->product->name ?? ''!!} | {!! $productOrder->accepted_amount ?? '' !!} |
@php
$aux++;
@endphp
@endif
@endforeach
Gracias,<br>
{!! config('app.name') !!}
@endcomponent
