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
  <a href="{!! route('client-new') !!}" class="btn btn-success">Nuevo cliente</a>
  <a href="{!! route('sale-new') !!}" class="btn bg-indigo ml-2">Nueva venta</a>
@endsection

@section('breadcrumbs')
  <div class="d-flex">
    <div class="breadcrumb">
      <a href="{!! route('home') !!}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Inicio</a>
      <a href="{!! route('client-show') !!}" class="breadcrumb-item">Clientes</a>
      <a href="{!! route('sale-show') !!}" class="breadcrumb-item">Ventas</a>
      <span class="breadcrumb-item active">Editando venta</span>
    </div>

    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
  </div>

@endsection
@section('content')
  <!-- Inner container -->
  <div class="d-flex align-items-start flex-column flex-md-row">

    <!-- Left content -->
    <div class="w-100 overflow-auto order-2 order-md-1">
      @include('errors.errors')

      <!-- List -->
      <div class="card card-body">
        @include('sale.productsDatatable')
      </div>
      <div class="card card-body">
        <div class="card-title">
          Agregar nuevo producto
        </div>
        <form class="" action="{!! route('sale-product-new',compact('sale')) !!}" method="post">
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
          <div class="card-header bg-transparent header-elements-inline">
            <span class="text-uppercase font-size-sm font-weight-semibold">Detalle de la venta #{{$sale->id}}</span>
            <div class="header-elements">
              <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
              </div>
            </div>
          </div>

          <div class="card-body">
            <form action="#">
              <div class="form-group form-group-feedback form-group-feedback-right">
                <select id="clients" class="form-control" name="client_id">
                  @isset($sale->client)
                    <option value="{{ old('client_id',$sale->client->id)}}" selected="selected">{{$sale->client->name}}, {{$sale->client->cuit}} </option>
                  @else
                    <option value="0" selected="selected"> Buscar cliente </option>
                  @endisset
                </select>
              </div>
            </form>
          </div>
          <div class="card-body">
          <form action="{!! route('sale-save') !!}">
            {{ csrf_field() }}
            {{ method_field('put') }}
            <div class="form-group">
              <label>TOTAL:</label>
              <input type="text" class="form-control bg-violet border-violet border-1 rounded-round text-center" id="totalAmount" placeholder="Total venta" name="totalAmount" value="${{number_format($sale->totalAmount(), 2, ',', '.')}}">
            </div>

            <div class="form-group">
              <label>Cliente:</label>
              <input type="text" class="form-control" placeholder="Nombre del cliente" id="client-name" readonly name="name" value="@isset($sale->client) {{$sale->client->name}} @endisset">
            </div>

            <div class="form-group">
              <label>Cuit:</label>
              <input type="text" class="form-control" placeholder="CUIT" id="client-cuit" readonly name="cuit" value="@isset($sale->client) {{$sale->client->cuit}} @endisset">
            </div>
            <div class="form-group">
              <label>Dirección:</label>
              <input type="text" class="form-control" placeholder="Dirección del cliente" id="client-address" readonly name="address" value="@isset($sale->client->address){{$sale->client->fullAddress()}} @endisset">
            </div>

            <div class="form-group">
              <label>Forma de pago:</label>
              <select id="paymentTypes" class="form-control" name="payment_type_id">
                @foreach ($paymentTypes as $paymentType)
                  <option value="{{ old('payment_type_id',$paymentType->id)}}"
                    @isset($sale->paymentType)
                      @if ($sale->paymentType->id === $paymentType->id)
                        selected="selected"
                      @endif
                    @endisset
                    >{{$paymentType->name}} </option>
                  @endforeach
                </select>
              </div>

            <div class="form-group">
              <label>Cuotas:</label>
              <input type="text" class="form-control" placeholder="Cantidad de cuotas" name="fee" value="{{$sale->fee}}">
            </div>

            <div class="form-group">
              <label>Fecha:</label>
              <input type="date" class="form-control" placeholder"Fecha de la venta" name="created_at" value="{{$sale->created_at->format('Y-m-d')}}">
            </div>
            <div class="form-group">
              <label>Estado:</label>
              <input type="text" class="form-control" readonly style="color:white; background-color:{{$sale->latestStatus->first()->color ?? ''}}" placeholder"Estado" name="status_id" value="{{$sale->latestStatus->first()->name ?? ''}}">
            </div>


            <div class="row">
              <div class="col-6">
                <a class="btn btn-warning btn-block" href="{{ URL::previous()}}">Volver</a>
              </div>
              <div class="col-6">
                <button type="submit" class="btn btn-info btn-block">Editar venta</button>
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
			@include('sale._fields')
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
    $( "#clients" ).select2({
      ajax: {
        url: "{{route('client-select-api')}}",
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

    $('#clients').on('select2:select', function (e) {
      var data = e.params.data;
      $('#client-name').val(data.name);
      $('#client-cuit').val(data.cuit);
      $('#client-address').val(data.address);
    });

</script>

@endsection
