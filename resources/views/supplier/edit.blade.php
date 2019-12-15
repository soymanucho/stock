@extends('layouts.app')

@section('main-sidebar')
  <!-- Main navigation -->
  <div class="card card-sidebar-mobile">
    <ul class="nav nav-sidebar" data-nav-type="accordion">

      <!-- Main -->
      <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Menú principal</div></li>
      <li class="nav-item">
        <a href="{!! route('home') !!}" class="nav-link">
          <i class="icon-home4"></i>
          <span>Inicio</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{!! route('client-show') !!}" class="nav-link">
          <i class="icon-users2"></i>
          <span>Clientes</span>
          {{-- <span class="badge bg-blue-400 align-self-center ml-auto">2.0</span> --}}
        </a>
      </li>
      <li class="nav-item">
        <a href="{!! route('product-show') !!}" class="nav-link">
          <i class="icon-stack"></i>
          <span>Productos</span>
          {{-- <span class="badge bg-blue-400 align-self-center ml-auto">2.0</span> --}}
        </a>
      </li>
      <li class="nav-item">
        <a href="{!! route('supplier-show') !!}" class="nav-link active">
          <i class="fas fa-user-tie"></i>
          <span>Proveedores</span>
          {{-- <span class="badge bg-blue-400 align-self-center ml-auto">2.0</span> --}}
        </a>
      </li>
      {{-- <li class="nav-item nav-item-submenu nav-item-expanded nav-item-open">
        <a href="#" class="nav-link"><i class="icon-stack"></i> <span>Ventas</span></a>

        <ul class="nav nav-group-sub" data-submenu-title="Ventas">
          <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link">Content sidebars</a>
            <ul class="nav nav-group-sub">
              <li class="nav-item"><a href="" class="nav-link">Left sidebar</a></li>
            </ul>
          </li>
          <li class="nav-item"><a href="l" class="nav-link">Boxed layout</a></li>
          <li class="nav-item-divider"></li>
          <li class="nav-item"><a href="" class="nav-link">Fixed main navbar</a></li>
        </ul>
      </li> --}}
      <!-- /main -->

    </ul>
  </div>
  <!-- /main navigation -->
@endsection

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
          <span class="text-uppercase font-size-sm font-weight-semibold">Proveedores</span>
          <div class="header-elements">
            <div class="list-icons">
              <a class="list-icons-item" data-action="collapse"></a>
            </div>
          </div>
        </div>

        <div class="card-body p-0">
          <ul class="nav nav-sidebar" data-nav-type="accordion">
            <li class="nav-item-header">Sub-menú</li>
            <li class="nav-item">
              <a href="{!! route('supplier-show') !!}" class="nav-link"><i class="icon-list3"></i> Ver todos</a>
            </li>
            <li class="nav-item">
              <a href="{!! route('supplier-new') !!}" class="nav-link"><i class="icon-user-plus"></i> Dar de alta</a>
            </li>
            <li class="nav-item-divider"></li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="icon-grid-alt"></i>
                Pedidos
                <span class="badge bg-primary badge-pill ml-auto">2</span>
              </a>
            </li>
            {{-- <li class="nav-item nav-item-submenu">
              <a href="#" class="nav-link"><i class="icon-grid-alt"></i> Menu levels</a>
              <ul class="nav nav-group-sub">
                <li class="nav-item"><a href="#" class="nav-link">Second level</a></li>
              </ul>
            </li> --}}
          </ul>
        </div>
      </div>
        <!-- /sub navigation -->
    </div>
  </div>
@endsection

@section('actions')
  <a href="{!! route('supplier-new') !!}" class="btn btn-success btn-disabled">Nuevo proveedor</a>
@endsection

@section('breadcrumbs')
  <div class="d-flex">
    <div class="breadcrumb">
      <a href="{!! route('home') !!}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Inicio</a>
      <a href="{!! route('supplier-show') !!}" class="breadcrumb-item">Proveedores</a>
      <span class="breadcrumb-item active">Editar proveedor</span>
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
		<h5 class="card-title">Editar proveedor</h5>
		<div class="header-elements">
			<div class="list-icons">
    		<a class="list-icons-item" data-action="collapse"></a>
    	</div>
  	</div>
	</div>

	<div class="card-body">
    @include('errors.errors')
		<form method="post">
      {{ csrf_field() }}
      {{ method_field('put') }}
			@include('supplier._fields')
			<div class="text-right">
				<a class="btn btn-danger" href="{{ URL::previous()}}">Volver</a>
				<button type="submit" class="btn btn-success">Editar proveedor <i class="fas fa-user-edit"></i></button>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


    $( "#locations" ).select2({
      ajax: {
        url: "{{route('location-api')}}",
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
            _token: CSRF_TOKEN,
            search: params.term // search term
          };
        },
        processResults: function (response) {
          return {
            results: response
          };
        },
        cache: true
      }

    });

</script>
@endsection
