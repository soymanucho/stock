
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
  {{-- <a href="{!! route('client-new') !!}" class="btn bg-teal-800">Nuevo cliente</a>
  <a href="{!! route('sale-new') !!}" class="btn bg-teal-700 ml-2">Nueva venta</a> --}}
  <a href="{!! route('receipt-show',compact('sale')) !!}" class="btn bg-teal-600 ml-2">Ver remitos</a>
  <a href="{!! route('budget-show',compact('sale')) !!}" class="btn bg-teal-600 ml-2">Ver facturas</a>
@endsection

@section('breadcrumbs')
  <div class="d-flex">
    <div class="breadcrumb">
      <a href="{!! route('home') !!}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Inicio</a>
      <a href="{!! route('client-show') !!}" class="breadcrumb-item">Clientes</a>
      <a href="{!! route('sale-show') !!}" class="breadcrumb-item">Ventas</a>
      <a href="{!! route('sale-edit',compact('sale')) !!}" class="breadcrumb-item">Venta #{{$sale->id}}</a>
      <span class="breadcrumb-item active">Facturas</span>
    </div>

    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
  </div>

@endsection

@section('content')

	<!-- Invoice archive -->
	<div class="card">
		<div class="card-header bg-transparent header-elements-inline">
			<h6 class="card-title">Registro de facturas</h6>
			<div class="header-elements">
				<div class="list-icons">
					<a class="list-icons-item" data-action="collapse"></a>
				</div>
			</div>
		</div>

    <div class="card-body">
  		@include('budget.datatable')
    </div>
	</div>
	<!-- /budget archive -->


@endsection
