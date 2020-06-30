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
              <a href="{!! route('order-new') !!}" class="nav-link active">
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
      <a href="{!! route('order-show') !!}" class="breadcrumb-item">Órdenes</a>
      <span class="breadcrumb-item active">Editando orden #{{$order->id}}</span>
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
  <!-- Inner container -->
  <div class="d-flex align-items-start flex-column flex-md-row">

    <!-- Left content -->
    <div class="w-100 overflow-auto order-2 order-md-1">
      @include('errors.errors')

      <!-- List -->
      <div class="card card-body">
        @include('order.productsDatatable')
      </div>
      <div class="card card-body">
        <div class="card-title">
          Agregar nuevo producto
        </div>
        <form class="" action="{!! route('order-product-new',compact('order')) !!}" method="post">
          {{ csrf_field() }}
          {{ method_field('post') }}
          <div class="row">

              <div class="form-group col-lg-5 col-md-12 col-sm-12">
                <label for="product_id" class="control-label">Producto</label>
                <select id="products" class="form-control" name="product_id"></select>
              </div>


              <div class="form-group col-lg-3 col-md-12 col-sm-12">
                <label for="amount" class="control-label">Cantidad</label>
                <input id="amount" name="amount" type="number" class="form-control" value="1">
              </div>


              <div class="form-group col-lg-4 col-md-12 col-sm-12">
                <label for="price" class="control-label">Precio unitario</label>
                <input id="price" name="price" type="number" class="form-control" step="any" value="">
              </div>


          </div>
          <button type="submit" class="btn bg-teal-400 mt-3 float-right"><i class="icon-cart-add mr-2"></i> Agregar nuevo producto</button>
        </form>
      </div>
      <!-- /list -->
      {{-- <div class="card-body">
        <button type="button" class="btn btn-primary" name="button">Agregar nuevo producto</button>
      </div> --}}
    </div>
    <!-- /left content -->

    <!-- Right sidebar component -->
    <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right border-0 shadow-0 order-1 order-md-2 sidebar-expand-md">

      <!-- Sidebar content -->
      <div class="sidebar-content">

        <!-- Categories -->
        <div class="card">
          <a class="btn btn-warning mb-1" href="{!! route('order-mail',compact('order')) !!}">Enviar pedido por mail</a>
          <a class="btn btn-primary" href="{!! route('order-receive',compact('order')) !!}">Recibir orden</a>
          <div class="card-header bg-transparent header-elements-inline">
            <span class="text-uppercase font-size-sm font-weight-semibold">Detalle de la orden #{{$order->id}}</span>
            <div class="header-elements">
              <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
              </div>
            </div>
          </div>

          <div class="card-body">
            <form action="" method="post">
            {{ csrf_field() }}
            {{ method_field('put') }}
            <div class="form-group">

              <label>TOTAL:</label>
              <input type="text" class="form-control bg-violet border-violet border-1 rounded-round text-center" id="totalAmount" placeholder="Total venta" name="totalAmount" value="${{number_format($order->totalAmount(), 2, ',', '.')}}">
            </div>
            <div class="form-group form-group-feedback form-group-feedback-right">

              <select id="suppliers" class="form-control" name="supplier_id">
                @isset($order->supplier)
                  <option value="{{ old('supplier_id',$order->supplier->id)}}" selected="selected">{{$order->supplier->name}} </option>
                @else
                  <option value="0" selected="selected"> Buscar proveedor </option>
                @endisset
              </select>
            </div>

            <div class="form-group">
              <label>Proveedor:</label>
              <input type="text" class="form-control" placeholder="Nombre del proveedor" id="supplier-name" readonly name="name" value="@isset($order->supplier) {{$order->supplier->name}} @endisset">
            </div>

            <div class="form-group">
              <label>Dirección:</label>
              <input type="text" class="form-control" placeholder="Dirección del proveedor" id="supplier-address" readonly name="address" value="@isset($order->supplier->address){{$order->supplier->fullAddress()}} @endisset">
            </div>

            <div class="form-group">
              <label>Fecha:</label>
              <input type="date" class="form-control" placeholder"Fecha de la orden" name="created_at" value="{{$order->created_at->format('Y-m-d')}}">
            </div>

            <div class="row">
              <div class="col-12">
                {{-- <a class="btn bg-teal btn-block mb-2" href="{!! route('order-remito-new',compact('order')) !!}">Generar remito</a> --}}
              </div>
              <div class="col-6">
                <a class="btn btn-secondary btn-block mb-2" href="{{ URL::previous()}}">Volver</a>
              </div>
              <div class="col-6">
                <button type="submit" class="btn btn-success btn-block mb-2">Guardar orden</button>
              </div>
            </div>
          </form>
        </div>


        </div>
        <!-- /categories -->

      </div>
      <!-- /sidebar content -->

    </div>
    <!-- /right sidebar component -->

  </div>
  <!-- /inner container -->


{{--
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Editar venta</h5>
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
			@include('order._fields')
			<div class="text-right">
				<a class="btn btn-danger" href="{{ URL::previous()}}">Volver</a>
				<button type="submit" class="btn btn-success">Editar venta <i class="fas fa-user-edit"></i></button>
			</div>
		</form>
	</div>
</div> --}}
<script type="text/javascript">
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $("#totalAmount").keydown(function (e) {
      e.preventDefault();
    });

    // $(window).bind('beforeunload', function(){
    //
    //   return 'Are you sure you want to leave?';
    // });

    $( "#products" ).select2({
      ajax: {
        url: "{{route('product-select-api')}}",
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
    $( "#suppliers" ).select2({
      ajax: {
        url: "{{route('supplier-select-api')}}",
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

    $('#suppliers').on('select2:select', function (e) {
      var data = e.params.data;
      $('#supplier-name').val(data.name);
      $('#supplier-address').val(data.address);
    });

</script>

@endsection
