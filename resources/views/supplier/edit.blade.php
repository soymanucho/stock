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
          <span class="text-uppercase font-size-sm font-weight-semibold">Proveedores</span>
          <div class="header-elements">
            <div class="list-icons">
              <a class="list-icons-item" data-action="collapse"></a>
            </div>
          </div>
        </div>

        <div class="card-body p-0">
          <ul class="nav nav-sidebar" data-nav-type="accordion">
            {{-- <li class="nav-item-header">Sub-menú</li> --}}
            <li class="nav-item">
              <a href="{!! route('supplier-show') !!}" class="nav-link"><i class="icon-list3"></i> Listar proveedores</a>
            </li>
            <li class="nav-item">
              <a href="{!! route('supplier-new') !!}" class="nav-link"><i class="icon-user-plus"></i> Nuevo proveedor</a>
            </li>
            <li class="nav-item-divider"></li>
            <li class="nav-item">
              <a href="{!! route('order-show') !!}" class="nav-link">
                <i class="icon-grid-alt"></i>
                Listar órdenes
                {{-- <span class="badge bg-primary badge-pill ml-auto">2</span> --}}
              </a>
            </li>
            <li class="nav-item">
              <a href="{!! route('order-new') !!}" class="nav-link">
                <i class="fas fa-cart-plus"></i>
                Nueva orden
                {{-- <span class="badge bg-primary badge-pill ml-auto">2</span> --}}
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
  <a href="{!! route('supplier-new') !!}" class="btn bg-teal-800">Nuevo proveedor</a>
  <a href="{!! route('order-new') !!}" class="btn bg-teal-700 ml-2">Nueva orden</a>
@endsection

@section('breadcrumbs')
  <div class="d-flex">
    <div class="breadcrumb">
      <a href="{!! route('home') !!}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Inicio</a>
      <a href="{!! route('supplier-show') !!}" class="breadcrumb-item">Proveedores</a>
      <span class="breadcrumb-item active">Editando proveedor #{{$supplier->id}}</span>
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
		<h5 class="card-title">Editando proveedor</h5>
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
