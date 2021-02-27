<!-- Main navigation -->
<div class="card card-sidebar-mobile">
  <ul class="nav nav-sidebar" data-nav-type="accordion">

    <!-- Main -->
    <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Menú principal</div></li>
    <li class="nav-item">
      <a href="{!! route('home') !!}" class="nav-link {{ !stristr(request()->route()->getName(),'dashboard') === false || !stristr(request()->route()->getName(),'home') === false ? ' active' : ''}}">
        <i class="icon-home4"></i>
        <span>Dashbard</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="{!! route('client-show') !!}" class="nav-link {{ (!stristr(request()->route()->getName(),'client') === false) ? ' active' : ''}}">
        <i class="fas fa-address-book"></i>
        <span>Clientes</span>
        {{-- <span class="badge bg-blue-400 align-self-center ml-auto">2.0</span> --}}
      </a>
    </li>
    <li class="nav-item">
      <a href="{!! route('sale-show') !!}" class="nav-link {{ (!stristr(request()->route()->getName(),'sale') === false) ? ' active' : ''}}">
        <i class="fas fa-cart-plus"></i>
        <span>Ventas</span>
        {{-- <span class="badge bg-blue-400 align-self-center ml-auto">2.0</span> --}}
      </a>
    </li>
    <li class="nav-item">
      <a href="{!! route('product-show') !!}" class="nav-link {{ (!stristr(request()->route()->getName(),'product') === false) ? ' active' : ''}}">
        <i class="fas fa-boxes"></i>
        <span>Productos</span>
        {{-- <span class="badge bg-blue-400 align-self-center ml-auto">2.0</span> --}}
      </a>
    </li>
    <li class="nav-item">
      <a href="{!! route('brand-show') !!}" class="nav-link {{ (!stristr(request()->route()->getName(),'brand') === false) ? ' active' : ''}}">
        <i class="fas fa-copyright"></i>
        <span>Marcas</span>
        {{-- <span class="badge bg-blue-400 align-self-center ml-auto">2.0</span> --}}
      </a>
    </li>
    @hasanyrole('Administrador')
    <li class="nav-item">
      <a href="{!! route('order-show') !!}" class="nav-link {{ (!stristr(request()->route()->getName(),'order') === false) ? ' active' : ''}}">
        <i class="fas fa-store-alt"></i>
        <span>Órdenes</span>
        {{-- <span class="badge bg-blue-400 align-self-center ml-auto">2.0</span> --}}
      </a>
    </li>
    <li class="nav-item">
      <a href="{!! route('supplier-show') !!}" class="nav-link {{ (!stristr(request()->route()->getName(),'supplier') === false) ? ' active' : ''}}">
        <i class="fas fa-user-tie"></i>
        <span>Proveedores</span>
        {{-- <span class="badge bg-blue-400 align-self-center ml-auto">2.0</span> --}}
      </a>
    </li>
    @endhasanyrole
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
