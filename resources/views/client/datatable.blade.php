@extends('layouts.datatable')

@section('header')

    <th>Nro. de cliente</th>
    <th>Institución</th>
    <th>CUIT</th>
    <th>Condición de pago</th>
    <th>Direccion</th>
    <th>Fecha última compra</th>
    {{-- <th>Total Gastado</th> --}}
    <th>Editar</th>
    <th>Detalle</th>


@endsection

@section('body')
  @foreach($clients as $client)
      <tr>
        <td>  {{ $client->id }} </td>
        <td>  {{ $client->name }} </td>
        <td>  {{ $client->cuit }} </td>
        <td>  {{ $client->paymentDay->name }} </td>
        <td>  {{ $client->fullAddress() }} </td>
        <td class="text-center">
          @isset($client->lastSale->first()->created_at)
            {{ $client->lastSale->first()->created_at->format('d/m/Y  ') }} </td>
          @else
            Sin compras aún
          @endisset
        {{-- <td>  {{ $client->totalPurchases() }} </td> --}}
        {{-- <td>  ${{ $client->totalSpent() }} </td> --}}
        <td class="text-center">  <a href={!! route('client-edit',compact('client')) !!} ><i class="fas fa-edit"></i></a> </td>
        <td class="text-center"> <a  href="{{ route('client-detail', compact('client')) }}" class="fancybox"><b class="fa fa-eye "></b></a> </td>
      </tr>
    @endforeach
@endsection
