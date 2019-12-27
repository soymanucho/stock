
@extends('layouts.app')

@section('secondary-sidebar')
  <!-- Secondary sidebar -->
  <div class="sidebar sidebar-light sidebar-secondary sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
      <a href="#" class="sidebar-mobile-secondary-toggle">
        <i class="icon-arrow-left8"></i>
      </a>
      <span class="font-weight-semibold"></span>
      <a href="#" class="sidebar-mobile-expand">
        <i class="icon-screen-full"></i>
        <i class="icon-screen-normal"></i>
      </a>
    </div>
      <!-- /sidebar mobile toggler -->
    <!-- Sidebar content -->
    <div class="sidebar-content">

      <!-- Sub navigation -->
      <div class="card mb-2">
        <div class="card-header bg-transparent header-elements-inline">
          <span class="text-uppercase font-size-sm font-weight-semibold">Clientes</span>
          <div class="header-elements">
            <div class="list-icons">
              <a class="list-icons-item" data-action="collapse"></a>
            </div>
          </div>
        </div>
        <div class="card-body p-0">
          <ul class="nav nav-sidebar" data-nav-type="accordion">
            <li class="nav-item">
              <a href="{!! route('client-show') !!}" class="nav-link"><i class="icon-list3"></i> Ver todos</a>
            </li>
            <li class="nav-item">
              <a href="{!! route('client-new') !!}" class="nav-link"><i class="icon-user-plus"></i> Dar de alta</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="card mb-2">
        <div class="card-header bg-transparent header-elements-inline">
          <span class="text-uppercase font-size-sm font-weight-semibold">Ventas</span>
          <div class="header-elements">
            <div class="list-icons">
              <a class="list-icons-item" data-action="collapse"></a>
            </div>
          </div>
        </div>
        <div class="card-body p-0">
          <ul class="nav nav-sidebar" data-nav-type="accordion">
            <li class="nav-item">
              <a href="{!! route('sale-show') !!}" class="nav-link"><i class="icon-list3"></i> Ver todas</a>
            </li>
            <li class="nav-item">
              <a href="{!! route('sale-new') !!}" class="nav-link"><i class="icon-user-plus"></i> Nueva venta</a>
            </li>
          </ul>
        </div>
      </div>
        <!-- /sub navigation -->
    </div>
  </div>
@endsection

@section('actions')
  <a href="{!! route('client-new') !!}" class="btn bg-teal-800">Nuevo cliente</a>
  <a href="{!! route('sale-new') !!}" class="btn bg-teal-700 ml-2">Nueva venta</a>
  <a href="{!! route('receipt-show',compact('sale')) !!}" class="btn bg-teal-600 ml-2">Ver remitos</a>
@endsection

@section('breadcrumbs')
  <div class="d-flex">
    <div class="breadcrumb">
      <a href="{!! route('home') !!}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Inicio</a>
      <a href="{!! route('client-show') !!}" class="breadcrumb-item">Clientes</a>
      <a href="{!! route('sale-show') !!}" class="breadcrumb-item">Ventas</a>
      <a href="{!! route('sale-edit',compact('sale')) !!}" class="breadcrumb-item">Venta</a>
      <span class="breadcrumb-item active">Remitos</span>
    </div>

    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
  </div>

@endsection

@section('content')

	<!-- Invoice archive -->
	<div class="card">
		<div class="card-header bg-transparent header-elements-inline">
			<h6 class="card-title">Registro de remitos</h6>
			<div class="header-elements">
				<div class="list-icons">
					<a class="list-icons-item" data-action="collapse"></a>
				</div>
			</div>
		</div>

    <div class="card-body">
  		<table class="table table-lg stripe table-hover display nowrap" id="myTable" >
  			<thead>
  				<tr>
  					<th>#</th>
  					<th>Cliente</th>
  					<th>Fecha del recibo</th>
  					<th>Fecha de pago</th>
  					<th>Total</th>
  					<th class="text-center">Acciones</th>
  				</tr>
  			</thead>
  			<tbody>
          @foreach ($receipts as $receipt)
      			<tr>
      				<td>#{{$receipt->id}}</td>
    					<td>
    						<h6 class="mb-0">
    							<a href="#">{{$receipt->sale->client->name ?? '' }}</a>
    							<span class="d-block font-size-sm text-muted">Módo de pago: {{$receipt->sale->paymentType->name ?? ''}}</span>
    						</h6>
    					</td>
    					<td>
    						{{$receipt->created_at->format('M d, y')}}
    					</td>
    					<td>
    						<span class="badge badge-success">Pago el 16 Mar 2015</span>
    					</td>
    					<td>
    						<h6 class="mb-0 font-weight-bold">${{$receipt->totalAmount()}} <span class="d-block font-size-sm text-muted font-weight-normal">IVA {{$receipt->totalIVA()}}</span></h6>
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

  			</tbody>
  		</table>
    </div>
	</div>
	<!-- /invoice archive -->


@endsection
