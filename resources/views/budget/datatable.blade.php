@extends('layouts.datatable')

@section('header')

    <th>#</th>
    <th>Cliente</th>
    <th>Fecha de la factura</th>
    <th>Fecha de pago</th>
    <th>Total</th>
    <th class="text-center">Acciones</th>


@endsection

@section('body')
    @foreach ($budgets as $budget)
      <tr>
        <td>{{$budget->type}}{{$budget->prefix_number}}-{{$budget->number}}</td>
        <td>
          <h6 class="mb-0">
            @php
              $client = $budget->sale->client;
            @endphp
            <a href="{{ route('client-detail', compact('client')) }}" class="fancybox">{{$client->name ?? '' }}</a>
            <span class="d-block font-size-sm text-muted">Módo de pago: {{$budget->sale->paymentType->name ?? ''}}</span>
          </h6>
        </td>
        <td>
          {{$budget->created_at->format('M d, y')}}
        </td>
        <td>
          <span class="badge badge-success">Pago el 16 Mar 2015</span>
        </td>
        <td>
          <h6 class="mb-0 font-weight-bold">${{$budget->totalAmount()}} <span class="d-block font-size-sm text-muted font-weight-normal">IVA {{$budget->totalIVA()}}</span></h6>
        </td>
        <td class="text-center">
          <div class="list-icons list-icons-extended">
            <a href="{!! route('budget-detail',compact('sale','budget')) !!}" class="list-icons-item fancybox"><i class="icon-file-eye"></i></a>
            <div class="list-icons-item dropdown">
              <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
              <div class="dropdown-menu dropdown-menu-right">
                {{-- <a href="{!! route('budget-download', compact('sale','budget')) !!}" class="dropdown-item" target="_blank"><i class="icon-file-download"></i> Descargar</a> --}}
                <a href="{!! route('budget-print', compact('sale','budget')) !!}" class="dropdown-item" target="_blank"><i class="icon-printer"></i> Imprimir</a>
                <div class="dropdown-divider"></div>
                {{-- <a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a> --}}
                <a href="{!! route('budget-delete', compact('sale','budget')) !!}" class="dropdown-item"><i class="icon-cross2"></i> Eliminar</a>
              </div>
            </div>
          </div>
        </td>
      </tr>
    @endforeach
@endsection
