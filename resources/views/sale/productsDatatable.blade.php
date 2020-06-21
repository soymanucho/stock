@extends('layouts.datatable')

@section('header')

    {{-- <th># producto</th> --}}
    <th>Nombre</th>
    <th>En remito</th>
    <th>En factura</th>
    {{-- <th>Fecha</th> --}}
    <th>Precio</th>
    <th>Cantidad</th>
    <th>Subtotal</th>
    {{-- <th># Compras</th>
    <th>Total Gastado</th> --}}
    <th>Estado</th>
    {{-- <th>Quitar</th> --}}
    {{-- <th>Historial</th> --}}


@endsection

@section('body')
  @foreach($sale->products as $productSale)
      <tr >
        {{-- <td class="text-center">  {{ $productSale->product->id ?? ''}} </td> --}}
        <td class="text-center">  {{ $productSale->product->name ?? '' }} </td>
        @isset($productSale->receipt->id )
          <td class="text-center">  {{ $productSale->receipt->id }} </td>
        @else
          <td class="text-center"> <span class="badge badge-primary">Sin remitir</span> </td>
        @endisset
        @isset($productSale->invoice->id )
          <td class="text-center">  {{ $productSale->invoice->id }} </td>
        @else
          <td class="text-center"> <span class="badge badge-danger">Sin facturar</span> </td>
        @endisset
        {{-- <td class="text-center">  {{ $productSale->created_at->format('d/m/y') ?? '' }} </td> --}}
        <td class="text-center">  {{ $productSale->price ?? '' }} </td>
        <td class="text-center">  {{ $productSale->amount ?? '' }}  </td>
        <td class="text-center">  {{ number_format($productSale->amount*$productSale->price ?? '', 2, ',', '.')}}  </td>
        <td class="text-center">
          <div class="btn-group">
            @if (!($productSale->status->name === 'Entregado' || $productSale->status->name === 'Facturado'))
          	<button type="button" class="btn btn-labeled btn-labeled-right dropdown-toggle" style="color:white; background-color:{{$productSale->status->color ?? ''}}" data-toggle="dropdown" aria-expanded="false"><b><i class="icon-menu7"></i></b> {{ $productSale->status->name ?? '' }}</button>
          	<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-38px, 36px, 0px);">

                @foreach ($productStatuses as $productStatus)
                  @if ($productStatus == $productSale->status || in_array($productStatus->name,["Recibido","Entregado","Facturado"]))
                    @php
                      continue;
                    @endphp
                  @endif
                  <a href="{!! route('sale-product-status-edit',compact('sale','productSale','productStatus')) !!}" class="dropdown-item" style="color:white; background-color:{{$productStatus->color}}"><i class="fas fa-exchange-alt"></i> {{$productStatus->name}}</a>
                  @endforeach
						</div>
            @else
              <button type="button" class="btn" style="color:white; background-color:{{$productSale->status->color ?? ''}}" > {{ $productSale->status->name ?? '' }}</button>
            @endif
					</div>

        {{-- <td>  {{ $client->totalPurchases() }} </td> --}}
        {{-- <td>  ${{ $client->totalSpent() }} </td> --}}
        {{-- <td class="text-center">  <a href={!! route('sale-product-delete',compact('sale','productSale')) !!} ><i class="fas fa-trash"></i></a> </td> --}}
        {{-- <td class="text-center fancybox" href="{{ route('detail-client', compact('client')) }}"> <a><b class="fa fa-eye "></b></a> </td> --}}
      </tr>
    @endforeach
@endsection
