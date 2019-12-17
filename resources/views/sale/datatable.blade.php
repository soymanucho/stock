@extends('layouts.datatable')

@section('header')

    <th># Venta</th>
    <th>Cliente</th>
    <th># de productos</th>
    <th>Estado</th>
    {{-- <th># Compras</th>
    <th>Total Gastado</th> --}}
    <th>Acciones</th>
    {{-- <th>Historial</th> --}}


@endsection

@section('body')
  @foreach($sales as $sale)
      <tr >
        <td>  #{{ $sale->id }} </td>
        <td>  {{ $sale->client->name }}, CUIT {{ $sale->client->cuit }} </td>
        <td>  {{ $sale->products->count() }} </td>
        <td>
          @isset($sale->latestStatus)
            {{ $sale->latestStatus->first->name }}
          @else
            Sin estado definido
          @endisset
        </td>
        {{-- <td>  {{ $client->totalPurchases() }} </td> --}}
        {{-- <td>  ${{ $client->totalSpent() }} </td> --}}
        <td class="text-center">  <a href={!! route('sale-edit',compact('sale')) !!} ><i class="fas fa-edit"></i></a> </td>
        {{-- <td class="text-center fancybox" href="{{ route('detail-client', compact('client')) }}"> <a><b class="fa fa-eye "></b></a> </td> --}}
      </tr>
    @endforeach
@endsection
