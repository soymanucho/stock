@extends('layouts.datatable')

@section('header')

    <th>Nombre</th>
    {{-- <th># Compras</th>
    <th>Total Gastado</th> --}}
    <th>Ver productos</th>
    <th>Editar</th>
    <th>Eliminar</th>
    {{-- <th>Historial</th> --}}


@endsection

@section('body')
  @foreach($brands as $brand)
      <tr >
        <td>  {{ $brand->name }} </td>
        {{-- <td>  {{ $brand->totalPurchases() }} </td> --}}
        {{-- <td>  ${{ $brand->totalSpent() }} </td> --}}
        <td class="text-center">  <a href={!! route('brand-detail',compact('brand')) !!} class="fancybox" ><i class="fa fa-eye"></i></a> </td>
        <td class="text-center">  <a href={!! route('brand-edit',compact('brand')) !!} ><i class="fas fa-edit"></i></a> </td>
        <td class="text-center">  <a href={!! route('brand-delete',compact('brand')) !!} ><i class="fa fa-trash"></i></a> </td>
      </tr>
    @endforeach
@endsection
