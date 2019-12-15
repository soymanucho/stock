@extends('layouts.datatable')

@section('header')

    <th>Nombre</th>
    <th>Direccion</th>
    {{-- <th># Compras</th>
    <th>Total Gastado</th> --}}
    <th>Acciones</th>
    {{-- <th>Historial</th> --}}


@endsection

@section('body')
  @foreach($suppliers as $supplier)
      <tr >
        <td>  {{ $supplier->name }} </td>
        <td>  {{ $supplier->fullAddress() }} </td>
        {{-- <td>  {{ $supplier->totalPurchases() }} </td> --}}
        {{-- <td>  ${{ $supplier->totalSpent() }} </td> --}}
        <td class="text-center">  <a href={!! route('supplier-edit',compact('supplier')) !!} ><i class="fas fa-edit"></i></a> </td>
        {{-- <td class="text-center fancybox" href="{{ route('detail-supplier', compact('supplier')) }}"> <a><b class="fa fa-eye "></b></a> </td> --}}
      </tr>
    @endforeach
@endsection
