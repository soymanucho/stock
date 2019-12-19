@extends('layouts.datatable')

@section('header')

    <th># producto</th>
    <th>Nombre</th>
    <th>Precio unitario</th>
    <th>Cantidad</th>
    <th>Subtotal</th>
    {{-- <th># Compras</th>
    <th>Total Gastado</th> --}}
    <th>Estado</th>
    <th>Quitar</th>
    {{-- <th>Historial</th> --}}


@endsection

@section('body')
  @foreach($products as $productSale)
      <tr >
        <td>  {{ $productSale->product->id ?? ''}} </td>
        <td>  {{ $productSale->product->name ?? '' }} </td>
        <td>  {{ $productSale->price ?? '' }} </td>
        <td>  {{ $productSale->amount ?? '' }}  </td>
        <td>  {{ number_format($productSale->amount*$productSale->price ?? '', 2, ',', '.')}}  </td>
        <td>  <span class="badge badge-pill" style="color:white; background-color:{{$productSale->status->color ?? ''}}">{{ $productSale->status->name ?? '' }}</span>  </td>
        {{-- <td>  {{ $client->totalPurchases() }} </td> --}}
        {{-- <td>  ${{ $client->totalSpent() }} </td> --}}
        <td class="text-center">  <a href={!! route('sale-product-delete',compact('sale','productSale')) !!} ><i class="fas fa-trash"></i></a> </td>
        {{-- <td class="text-center fancybox" href="{{ route('detail-client', compact('client')) }}"> <a><b class="fa fa-eye "></b></a> </td> --}}
      </tr>
    @endforeach
@endsection
