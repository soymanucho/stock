@extends('layouts.datatable')

@section('header')

    <th>Nombre</th>
    <th>CUIT</th>
    <th>Direccion</th>
    {{-- <th># Compras</th>
    <th>Total Gastado</th> --}}
    <th>Editar</th>
    <th>Detalle</th>


@endsection

@section('body')
  @foreach($clients as $client)
      <tr >
        <td>  {{ $client->name }} </td>
        <td>  {{ $client->cuit }} </td>
        <td>  {{ $client->fullAddress() }} </td>
        {{-- <td>  {{ $client->totalPurchases() }} </td> --}}
        {{-- <td>  ${{ $client->totalSpent() }} </td> --}}
        <td class="text-center">  <a href={!! route('client-edit',compact('client')) !!} ><i class="fas fa-edit"></i></a> </td>
        <td class="text-center"> <a  href="{{ route('client-detail', compact('client')) }}" class="fancybox"><b class="fa fa-eye "></b></a> </td>
      </tr>
    @endforeach
@endsection
