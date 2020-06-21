@extends('layouts.datatable')

@section('header')

    <th>Número CAE</th>
    <th>Fecha inicio</th>
    <th>Fecha fin</th>

    <th>Eliminar</th>
    {{-- <th>Detalle</th> --}}


@endsection

@section('body')
  @foreach($caeVouchers as $caeVoucher)
      <tr>
        <td>  {{ $caeVoucher->number }} </td>
        <td>  {{ $caeVoucher->ini_date }} </td>
        <td>  {{ $caeVoucher->fin_date }} </td>

        <td class="text-center">  <a href={!! route('configuration-cae-delete',compact('caeVoucher')) !!} ><i class="fas fa-trash"></i></a> </td>
        {{-- <td class="text-center"> <a  href="{{ route('client-detail', compact('client')) }}" class="fancybox"><b class="fa fa-eye "></b></a> </td> --}}
      </tr>
    @endforeach
@endsection
