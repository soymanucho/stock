@extends('layouts.datatable')

@section('header')

    <th># Venta</th>
    <th>Fecha</th>
    <th>Cliente</th>
    <th># de productos</th>
    <th>Tpo. pago/Cuotas</th>
    <th>Total</th>
    <th>Estado</th>
    {{-- <th># Compras</th>
    <th>Total Gastado</th> --}}
    <th>Acciones</th>
    {{-- <th>Eliminar</th> --}}
    {{-- <th>Historial</th> --}}


@endsection

@section('body')
  @foreach($sales as $sale)
      <tr >
        <td>  {{ $sale->id }} </td>
        <td>  {{ $sale->created_at->format('d/m/Y h:i') }} </td>
        <td>
          {{ $sale->client->name ?? 'Indefinido'}}, CUIT {{ $sale->client->cuit ?? 'Indefinido' }}
        </td>
        <td>  {{ $sale->products->where('product_status_id','<>',1)->count() }} </td>
        <td>  {{$sale->paymentType->name ?? 'Indefinido'}} en {{ $sale->fee }} cuota/s </td>
        <td>  ${{number_format($sale->totalAmount(), 2, ',', '.')}} </td>
        <td>
          @php
          $status = $sale->latestStatus->first()->name ?? 'Indefinido'
          @endphp
          @isset($status)
            {{ $status }}
          @endisset
        </td>
        {{-- <td>  {{ $client->totalPurchases() }} </td> --}}
        {{-- <td>  ${{ $client->totalSpent() }} </td> --}}
        <td class="text-center">  <a href={!! route('sale-edit',compact('sale')) !!} ><i class="fas fa-edit" style="color:orange"></i></a> <a href={!! route('sale-delete',compact('sale')) !!} ><i class="fas fa-trash" style="color:red"></i></a></td>

        {{-- <td class="text-center fancybox" href="{{ route('detail-client', compact('client')) }}"> <a><b class="fa fa-eye "></b></a> </td> --}}
      </tr>
    @endforeach
@endsection
