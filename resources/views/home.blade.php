@extends('layouts.app')

@section('main-sidebar')
  <!-- Main navigation -->
  <div class="card card-sidebar-mobile">
    <ul class="nav nav-sidebar" data-nav-type="accordion">

      <!-- Main -->
      <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
      <li class="nav-item">
        <a href="../full/index.html" class="nav-link">
          <i class="icon-home4"></i>
          <span>Inicio</span>
        </a>
      </li>
      <li class="nav-item nav-item-submenu nav-item-expanded nav-item-open">
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
      </li>
      <li class="nav-item">
        <a href="" class="nav-link">
          <i class="icon-list-unordered"></i>
          <span>Changelog</span>
          <span class="badge bg-blue-400 align-self-center ml-auto">2.0</span>
        </a>
      </li>
      <!-- /main -->

    </ul>
  </div>
  <!-- /main navigation -->
@endsection

@section('secondary-sidebar')
  <!-- Sub navigation -->
  <div class="card mb-2">
    <div class="card-header bg-transparent header-elements-inline">
      <span class="text-uppercase font-size-sm font-weight-semibold">Navegación</span>
      <div class="header-elements">
        <div class="list-icons">
          <a class="list-icons-item" data-action="collapse"></a>
        </div>
      </div>
    </div>

    <div class="card-body p-0">
      <ul class="nav nav-sidebar" data-nav-type="accordion">
        <li class="nav-item-header">Category title</li>
        <li class="nav-item">
          <a href="#" class="nav-link"><i class="icon-googleplus5"></i> Link</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link"><i class="icon-portfolio"></i> Another link</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="icon-user-plus"></i>
            Link with badge
            <span class="badge bg-primary badge-pill ml-auto">2</span>
          </a>
        </li>
        <li class="nav-item-divider"></li>
        <li class="nav-item nav-item-submenu">
          <a href="#" class="nav-link"><i class="icon-cog3"></i> Menu levels</a>
          <ul class="nav nav-group-sub">
            <li class="nav-item"><a href="#" class="nav-link">Second level</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <!-- /sub navigation -->
@endsection

@section('breadcrumbs')
  <div class="d-flex">
    <div class="breadcrumb">
      <a href="" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Inicio</a>
      <a href="" class="breadcrumb-item">Link</a>
      <span class="breadcrumb-item active">Current</span>
    </div>

    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
  </div>

  <div class="header-elements d-none">
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
  </div>
@endsection
@section('content')

<div class="card">
    <div class="card-header">Dashboard</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        You are logged in!
    </div>
</div>

@endsection
