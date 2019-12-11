@extends('layouts.datatable')

@section('header')

    <th>#ID</th>
    <th>Código</th>
    <th>Nombre</th>
    <th>Descripción</th>
    <th>Marca</th>
    <th>Acciones</th>

@endsection

@section('body')
  @foreach($products as $product)
      <tr >
        <td>  {{ $product->id }} </td>
        <td>  {{ $product->code }} </td>
        <td>  {{ $product->name }} </td>
        <td>  {{ $product->description }} </td>
        <td>  {{ $product->brand->name }} </td>
        <td class="text-center">  <a href={!! route('product-edit',compact('product')) !!} ><b class="icon-database-edit2"></b></a> </td>
        {{-- <td class="text-center fancybox" href="{{ route('detail-client', compact('client')) }}"> <a><b class="fa fa-eye "></b></a> </td> --}}
      </tr>
    @endforeach
@endsection
