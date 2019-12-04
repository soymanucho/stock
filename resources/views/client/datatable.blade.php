@extends('layouts.datatable')

@section('header')

    <th>Nombre</th>
    <th>CUIT</th>
    <th>Direccion</th>
    {{-- <th># Compras</th>
    <th>Total Gastado</th> --}}
    {{-- <th>Acciones</th>
    <th>Historial</th> --}}


@endsection

@section('body')
  @foreach($clients as $client)
      <tr >
        <td>  {{ $client->name }} </td>
        <td>  {{ $client->cuit }} </td>
        <td>  {{ $client->fullAddress() }} </td>
        {{-- <td>  {{ $client->totalPurchases() }} </td> --}}
        {{-- <td>  ${{ $client->totalSpent() }} </td> --}}
        {{-- <td class="text-center">  <a href={!! route('edit-client',compact('client')) !!} ><b class="fa fa-edit "></b></a> </td> --}}
        {{-- <td class="text-center fancybox" href="{{ route('detail-client', compact('client')) }}"> <a><b class="fa fa-eye "></b></a> </td> --}}
      </tr>
    @endforeach
@endsection
