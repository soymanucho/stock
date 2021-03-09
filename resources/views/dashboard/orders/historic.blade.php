<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
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
          <span class="text-uppercase font-size-sm font-weight-semibold">Histórico</span>
          <div class="header-elements">
            <div class="list-icons">
              <a class="list-icons-item" data-action="collapse"></a>
            </div>
          </div>
        </div>

        <div class="card-body p-0">
          <ul class="nav nav-sidebar" data-nav-type="accordion">
            <li class="nav-item">
              <a href="{!! route('home') !!}" class="nav-link"><i class="icon-list3"></i> Ventas</a>
            </li>
            <li class="nav-item">
              <a href="{!! route('dashboard') !!}" class="nav-link active"><i class="icon-list2"></i> Órdenes</a>
            </li>
            <li class="nav-item-divider"></li>
          </ul>
        </div>
      </div>
      {{-- <div class="card mb-2">
        <div class="card-header bg-transparent header-elements-inline">
          <span class="text-uppercase font-size-sm font-weight-semibold">Estadísticas</span>
          <div class="header-elements">
            <div class="list-icons">
              <a class="list-icons-item" data-action="collapse"></a>
            </div>
          </div>
        </div>

        <div class="card-body p-0">
          <ul class="nav nav-sidebar" data-nav-type="accordion">
            <li class="nav-item">
              <a href="{!! route('brand-show') !!}" class="nav-link"><i class="icon-list3"></i>Ventas</a>
            </li>
            <li class="nav-item">
              <a href="{!! route('brand-new') !!}" class="nav-link"><i class="icon-list2"></i> Órdenes</a>
            </li>
            <li class="nav-item-divider"></li>
          </ul>
        </div>
      </div>
      <div class="card mb-2">
        <div class="card-header bg-transparent header-elements-inline">
          <span class="text-uppercase font-size-sm font-weight-semibold">Listados</span>
          <div class="header-elements">
            <div class="list-icons">
              <a class="list-icons-item" data-action="collapse"></a>
            </div>
          </div>
        </div>

        <div class="card-body p-0">
          <ul class="nav nav-sidebar" data-nav-type="accordion">
            <li class="nav-item">
              <a href="{!! route('brand-show') !!}" class="nav-link"><i class="icon-list3"></i>Ventas</a>
            </li>
            <li class="nav-item">
              <a href="{!! route('brand-new') !!}" class="nav-link"><i class="icon-list2"></i> Órdenes</a>
            </li>
            <li class="nav-item-divider"></li>
          </ul>
        </div>
      </div> --}}
        <!-- /sub navigation -->
    </div>
  </div>
@endsection
@section('actions')
  <a href="{!! route('brand-new') !!}" class="btn bg-teal ml-2">Nueva marca</a>
  <a href="{!! route('product-new') !!}" class="btn bg-teal ml-2">Nuevo producto</a>
  <a href="{!! route('client-new') !!}" class="btn bg-teal ml-2">Nuevo cliente</a>
  <a href="{!! route('sale-new') !!}" class="btn bg-teal ml-2">Nueva venta</a>
@endsection

@section('breadcrumbs')
  <div class="d-flex">
    <div class="breadcrumb">
      <a href="" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Inicio</a>
      {{-- <a href="" class="breadcrumb-item">Link</a> --}}
      <span class="breadcrumb-item active">Panel de control</span>
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

  <div class="row">
      <div class="col-lg-3">
          <div class="card bg-teal-400">
              <div class="card-body">
                  <div class="d-flex">
                      <h3 class="font-weight-semibold mb-0">{{$newClients}}</h3>
                      {{-- <span class="badge bg-teal-800 badge-pill align-self-center ml-auto">+53,6%</span> --}}
                  </div>

                  <div> Nuevos clientes este mes
                      <div class="font-size-sm opacity-75">{{$totalClients}} total</div>
                  </div>
              </div>
              <div class="container-fluid">
              </div>
          </div>
      </div>
      <div class="col-lg-3">
          <div class="card bg-pink-400">
              <div class="card-body">
                  <div class="d-flex">
                      <h3 class="font-weight-semibold mb-0">{{$newSuppliers}}</h3>
                      <div class="list-icons ml-auto">

                      </div>
                  </div>

                  <div>
                      Nuevos proveedores este mes
                      <div class="font-size-sm opacity-75">{{$totalSuppliers}} total</div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-lg-3">
          <div class="card bg-green-400">
              <div class="card-body">
                  <div class="d-flex">
                      <h3 class="font-weight-semibold mb-0">{{$newSales}}</h3>
                      <div class="list-icons ml-auto">

                      </div>
                  </div>

                  <div>
                      Cantidad de ventas este mes
                      <div class="font-size-sm opacity-75">{{$totalSales}} total</div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-lg-3">
          <div class="card bg-orange-400">
              <div class="card-body">
                  <div class="d-flex">
                      <h3 class="font-weight-semibold mb-0">{{$newOrders}}</h3>
                      <div class="list-icons ml-auto">

                      </div>
                  </div>

                  <div>
                      Cantidad de órdenes este mes
                      <div class="font-size-sm opacity-75">{{$totalOrders}} total</div>
                  </div>
              </div>
          </div>
      </div>



  </div>

    @include('dashboard.orders.monthlyOrders')
    @include('dashboard.orders.monthlyOrdersAmount')
    @include('dashboard.orders.ordersByHour')
    @include('dashboard.orders.ordersByWeekDay')

@endsection
