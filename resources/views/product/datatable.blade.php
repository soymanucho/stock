@extends('layouts.datatable')

@section('header')

    <th>#ID</th>
    <th>Código</th>
    <th>Nombre</th>
    <th>Stock</th>
    {{-- <th>Precios (Mín./Máx.)</th> --}}
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
        <td class="text-center">
          <span
          @if (abs($product->stock) == $product->stock)
            class="badge badge-success"
          @else
            class="badge badge-danger"
          @endif
          >{{ $product->stock }}</span>
        </td>
        {{-- <td>  ${{ number_format($product->suppliers->min('pivot.price'),2,',','.') }} / ${{ number_format($product->suppliers->max('pivot.price'),2,',','.') }} </td> --}}
        <td>  {{ $product->description }} </td>
        <td>
          {{ $product->brand->name }}
          @if ($product->brand->trashed())
            (eliminada)
          @endif
        </td>
        <td class="text-center">  <a href={!! route('product-edit',compact('product')) !!} ><i class="fas fa-edit"></i></a> </td>
        {{-- <td class="text-center fancybox" href="{{ route('detail-client', compact('client')) }}"> <a><b class="fa fa-eye "></b></a> </td> --}}
      </tr>
    @endforeach
@endsection
