@extends('layouts.datatable')

@section('header')

    <th># cliente</th>
    <th>Institución</th>
    <th>CUIT</th>
    <th>Cond. de pago</th>
    <th>Direccion</th>
    <th>Fecha últ. compra</th>
    {{-- <th>Total Gastado</th> --}}
    <th>Acciones</th>
    {{-- <th>Detalle</th> --}}


@endsection

@section('body')
  @foreach($clients as $client)
      <tr>
        <td>  {{ $client->id }} </td>
        <td>  {{ $client->name }} </td>
        <td>  {{ $client->cuit }} </td>
        @isset($client->paymentDay)
          <td>  {{ $client->paymentDay->name }} </td>
        @else
          <td> Indefinido </td>
        @endisset
        @isset($client->address)
          <td data-toggle="tooltip" data-placement="top" title="{{$client->fullAddress()}}">  {{ $client->midAddress() }}... </td>
        @else
          <td> Indefinido </td>
        @endisset
        <td class="text-center">
          @isset($client->lastSale->first()->created_at)
            {{ $client->lastSale->first()->created_at->format('d/m/Y  ') }} </td>
          @else
            Sin compras aún
          @endisset
        {{-- <td>  {{ $client->totalPurchases() }} </td> --}}
        {{-- <td>  ${{ $client->totalSpent() }} </td> --}}
        <td class="text-center">  <a href={!! route('client-edit',compact('client')) !!} ><i class="fas fa-edit"></i></a> <a  href="{{ route('client-detail', compact('client')) }}" class="fancybox"><b class="fa fa-eye "></b></a>  </td>
      </tr>
    @endforeach
@endsection
