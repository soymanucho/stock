@extends('layouts.datatable')

@section('header')

    {{-- <th># producto</th> --}}
    <th>Nombre</th>
    <th>Fecha</th>
    <th>Cantidad</th>
    <th>Precio</th>
    <th>Subtotal</th>
    {{-- <th># Compras</th>
    <th>Total Gastado</th> --}}
    <th>Estado</th>
    <th>Quitar</th>
    {{-- <th>Historial</th> --}}


@endsection

@section('body')
  @foreach($order->products as $productOrder)
      <tr >
        {{-- <td class="text-center">  {{ $productSale->product->id ?? ''}} </td> --}}
        <td class="text-center">  {{ $productOrder->product->name ?? '' }} </td>
        <td class="text-center">  {{ $productOrder->created_at->format('d/m/y') ?? '' }} </td>
        <td class="text-center">  {{ $productOrder->accepted_amount ?? '' }}  </td>
        <td class="text-center">  {{ $productOrder->price ?? '' }} </td>
        <td class="text-center">  {{ number_format($productOrder->accepted_amount *$productOrder->price ?? '', 2, ',', '.')}}  </td>
        <td class="text-center">
          <div class="btn-group">
            @if ($productOrder->status->name !== 'Recibido')
          	<button type="button" class="btn btn-labeled btn-labeled-right dropdown-toggle" style="color:white; background-color:{{$productOrder->status->color ?? ''}}" data-toggle="dropdown" aria-expanded="false"><b><i class="icon-menu7"></i></b> {{ $productOrder->status->name ?? '' }}</button>
          	<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-38px, 36px, 0px);">

                @foreach ($productStatuses as $productStatus)
                  @if ($productStatus == $productOrder->status || in_array($productStatus->name,["Entregado","En stock","Recibido"]))
                    @php
                      continue;
                    @endphp
                  @endif
                  <a href="{!! route('order-product-status-edit',compact('order','productOrder','productStatus')) !!}" class="dropdown-item" style="color:white; background-color:{{$productStatus->color}}"><i class="fas fa-exchange-alt"></i> {{$productStatus->name}}</a>
                  @endforeach
						</div>
            @else
              <button type="button" class="btn" style="color:white; background-color:{{$productOrder->status->color ?? ''}}" > {{ $productOrder->status->name ?? '' }}</button>
            @endif
					</div>

        {{-- <td>  {{ $client->totalPurchases() }} </td> --}}
        {{-- <td>  ${{ $client->totalSpent() }} </td> --}}
        <td class="text-center">  <a href={!! route('order-product-delete',compact('order','productOrder')) !!} ><i class="fas fa-trash"></i></a> </td>
        {{-- <td class="text-center fancybox" href="{{ route('detail-client', compact('client')) }}"> <a><b class="fa fa-eye "></b></a> </td> --}}
      </tr>
    @endforeach
@endsection
