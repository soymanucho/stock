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
          <span class="text-uppercase font-size-sm font-weight-semibold">CAE</span>
          <div class="header-elements">
            <div class="list-icons">
              <a class="list-icons-item" data-action="collapse"></a>
            </div>
          </div>
        </div>
        <div class="card-body p-0">
          <ul class="nav nav-sidebar" data-nav-type="accordion">
            <li class="nav-item">
              <a href="{!! route('configuration-cae-show') !!}" class="nav-link active"><i class="icon-list3"></i>Listar histórico de CAEs</a>
            </li>
            <li class="nav-item">
              <a href="{!! route('configuration-cae-new') !!}" class="nav-link"><i class="icon-user-plus"></i> Nuevo CAE</a>
            </li>
          </ul>
        </div>
      </div>
      {{-- <div class="card mb-2">
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
              <a href="{!! route('client-show') !!}" class="nav-link"><i class="icon-list3"></i> Listar clientes</a>
            </li>
            <li class="nav-item">
              <a href="{!! route('client-new') !!}" class="nav-link active"><i class="icon-user-plus"></i> Nuevo cliente</a>
            </li>
          </ul>
        </div>
      </div> --}}

        <!-- /sub navigation -->
    </div>
  </div>
@endsection

@section('actions')
  <a href="{!! route('configuration-cae-new') !!}" class="btn bg-teal-800">Nuevo CAE</a>
  {{-- <a href="{!! route('sale-new') !!}" class="btn bg-teal-700 ml-2">Nueva venta</a> --}}
@endsection

@section('breadcrumbs')
  <div class="d-flex">
    <div class="breadcrumb">
      <a href="{!! route('home') !!}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Inicio</a>
      <a href="{!! route('configuration-cae-show') !!}" class="breadcrumb-item active">Listado de CAEs</a>
      {{-- <span class="breadcrumb-item active">Nuevo CAE</span> --}}
    </div>

    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
  </div>

  {{-- <div class="header-elements d-none">
    <div class="breadcrumb justify-content-center">
      <a href="#" class="breadcrumb-elements-item">
        Link
      </a>

      <div class="breadcrumb-elements-item dropdown p-0">
        <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
          Dropdown
        </a>

        <div class="dropdown-menu dropdown-menu-right">
          <a href="#" class="dropdown-item">Action</a>
          <a href="#" class="dropdown-item">Another action</a>
          <a href="#" class="dropdown-item">One more action</a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">Separate action</a>
        </div>
      </div>
    </div>
  </div> --}}
@endsection
@section('content')

  <div class="card">
  	<div class="card-header header-elements-inline">
  		<h5 class="card-title">CAEs</h5>
  		<div class="header-elements">
  			<div class="list-icons">
              		<a class="list-icons-item" data-action="collapse"></a>
              		{{-- <a class="list-icons-item" data-action="reload"></a> --}}
              		{{-- <a class="list-icons-item" data-action="remove"></a> --}}
              	</div>
            	</div>
  	</div>

  	<div class="card-body">

      @include('configuration.datatableCae')
  	</div>

  </div>

@endsection
