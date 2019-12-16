<!-- Main navigation -->
<div class="card card-sidebar-mobile">
  <ul class="nav nav-sidebar" data-nav-type="accordion">

    <!-- Main -->
    <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Menú principal</div></li>
    <li class="nav-item">
      <a href="{!! route('home') !!}" class="nav-link {{ !stristr(request()->route()->getName(),'home') === false ? ' active' : ''}}">
        <i class="icon-home4"></i>
        <span>Inicio</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="{!! route('client-show') !!}" class="nav-link {{ !stristr(request()->route()->getName(),'client') === false ? ' active' : ''}}">
        <i class="icon-users2"></i>
        <span>Clientes</span>
        {{-- <span class="badge bg-blue-400 align-self-center ml-auto">2.0</span> --}}
      </a>
    </li>
    <li class="nav-item">
      <a href="{!! route('product-show') !!}" class="nav-link {{ (!stristr(request()->route()->getName(),'product') === false || !stristr(request()->route()->getName(),'brand') === false) ? ' active' : ''}}">
        <i class="icon-grid"></i>
        <span>Productos</span>
        {{-- <span class="badge bg-blue-400 align-self-center ml-auto">2.0</span> --}}
      </a>
    </li>
    <li class="nav-item">
      <a href="{!! route('supplier-show') !!}" class="nav-link {{ !stristr(request()->route()->getName(),'supplier') === false ? ' active' : ''}}">
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
