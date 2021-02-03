@extends('layouts.datatable')

@section('header')

    <th class="text-center">#</th>
    <th class="text-center">Cliente</th>
    <th class="text-center">Fecha del recibo</th>
    <th class="text-center">Fecha de pago</th>
    <th class="text-center">Cant. de productos</th>
    <th class="text-center">Acciones</th>


@endsection

@section('body')
    @foreach ($receipts as $receipt)
      <tr>
        <td class="text-center">#{{$receipt->id}}</td>
        <td class="text-center"
          <h6 class="mb-0">
            @php
              $client = $receipt->sale->client;
            @endphp
            <a href="{{ route('client-detail', compact('client')) }}" class="fancybox">{{$client->name ?? '' }}</a>
            <span class="d-block font-size-sm text-muted">Módo de pago: {{$receipt->sale->paymentType->name ?? ''}}</span>
          </h6>
        </td>
        <td class="text-center">
          {{$receipt->created_at->format('M d, y')}}
        </td>
        <td class="text-center">
          <span class="badge badge-success">Pago el 16 Mar 2015</span>
        </td>
        <td class="text-center">
          <h6 class="mb-0 font-weight-bold">{{$receipt->totalAmount()}} <span class="d-block font-size-sm text-muted font-weight-normal"></span></h6>
        </td>
        <td class="text-center">
          <div class="list-icons list-icons-extended">
            <a href="{!! route('receipt-detail',compact('sale','receipt')) !!}" class="list-icons-item fancybox"><i class="icon-file-eye"></i></a>
            <div class="list-icons-item dropdown">
              <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
              <div class="dropdown-menu dropdown-menu-right">
                {{-- <a href="{!! route('receipt-download', compact('sale','receipt')) !!}" class="dropdown-item" target="_blank"><i class="icon-file-download"></i> Descargar</a> --}}
                <a href="{!! route('receipt-print', compact('sale','receipt')) !!}" class="dropdown-item" target="_blank"><i class="icon-printer"></i> Imprimir</a>
                <div class="dropdown-divider"></div>
                {{-- <a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a> --}}
                <a href="{!! route('receipt-delete', compact('sale','receipt')) !!}" class="dropdown-item"><i class="icon-cross2"></i> Eliminar</a>
              </div>
            </div>
          </div>
        </td>
      </tr>
    @endforeach
@endsection
