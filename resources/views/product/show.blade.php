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
          <span class="text-uppercase font-size-sm font-weight-semibold">Productos</span>
          <div class="header-elements">
            <div class="list-icons">
              <a class="list-icons-item" data-action="collapse"></a>
            </div>
          </div>
        </div>

        <div class="card-body p-0">
          <ul class="nav nav-sidebar" data-nav-type="accordion">
            <li class="nav-item">
              <a href="{!! route('product-show') !!}" class="nav-link active"><i class="fas fa-box-open"></i> Ver todos</a>
            </li>
            <li class="nav-item">
              <a href="{!! route('product-new') !!}" class="nav-link"><i class="icon-stack-plus"></i> Nuevo producto</a>
            </li>
            <li class="nav-item-divider"></li>
          </ul>
        </div>
      </div>
      <div class="card mb-2">
        <div class="card-header bg-transparent header-elements-inline">
          <span class="text-uppercase font-size-sm font-weight-semibold">Marcas</span>
          <div class="header-elements">
            <div class="list-icons">
              <a class="list-icons-item" data-action="collapse"></a>
            </div>
          </div>
        </div>

        <div class="card-body p-0">
          <ul class="nav nav-sidebar" data-nav-type="accordion">
            <li class="nav-item">
              <a href="{!! route('brand-show') !!}" class="nav-link"><i class="fas fa-tags"></i> Ver todas</a>
            </li>
            <li class="nav-item">
              <a href="{!! route('brand-new') !!}" class="nav-link"><i class="icon-stack-plus"></i> Nueva marca</a>
            </li>
            <li class="nav-item-divider"></li>
          </ul>
        </div>
      </div>
        <!-- /sub navigation -->
    </div>
  </div>
@endsection

@section('actions')
  <a href="{!! route('product-new') !!}" class="btn bg-teal-600 ml-2">Nuevo producto</a>
@endsection

@section('breadcrumbs')
  <div class="d-flex">
    <div class="breadcrumb">
      <a href="{!! route('home') !!}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Inicio</a>
      <a href="" class="breadcrumb-item">Productos</a>
      <span class="breadcrumb-item active">Ver todos</span>
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
		<h5 class="card-title">Productos</h5>
		<div class="header-elements">
			<div class="list-icons">
            		<a class="list-icons-item" data-action="collapse"></a>
            		{{-- <a class="list-icons-item" data-action="reload"></a> --}}
            		{{-- <a class="list-icons-item" data-action="remove"></a> --}}
            	</div>
          	</div>
	</div>

	<div class="card-body">

    @include('product.datatable')
	</div>

</div>
{{-- <script src="{{ asset('/js/jquery.min.js') }}" defer></script> --}}
@endsection
