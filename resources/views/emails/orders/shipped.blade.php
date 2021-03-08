@component('mail::message')

@slot('header')
  @component('mail::header', ['url' => config('app.url')])
      {{ config('app.name') }}
  @endcomponent
@endslot
# Hola, quería pedirte:
@php
  $aux = 1;
@endphp
@component('mail::table')

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
@endcomponent
Gracias,<br>
{!! config('app.name') !!}
{{-- Footer --}}
@slot('footer')
  @component('mail::footer')
      &copy; {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.
  @endcomponent
@endslot
@endcomponent
