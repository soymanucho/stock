@extends('layouts.datatable')

@section('header')

    <th># Orden</th>
    <th>Fecha</th>
    <th>Proveedor</th>
    <th># de productos</th>
    <th>Total</th>
    <th>Editar</th>

@endsection

@section('body')
  @foreach($orders as $order)
      <tr >
        <td>  {{ $order->id }} </td>
        <td>  {{ $order->created_at->format('d/m/Y h:i') }} </td>
        <td>  {{ $order->supplier->name ?? 'Indefinido'}} </td>
        <td>  {{ $order->products->where('product_status_id','<>',1)->count() }} </td>
        <td>  ${{number_format($order->totalAmount(), 2, ',', '.')}} </td>
        <td class="text-center">  <a href={!! route('order-edit',compact('order')) !!} ><i class="fas fa-edit"></i></a> </td>
      </tr>
    @endforeach
@endsection
