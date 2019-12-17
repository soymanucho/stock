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
            <li class="nav-item-header">Sub-menú</li>
            <li class="nav-item">
              <a href="#" class="nav-link active"><i class="icon-list3"></i> Ver todos</a>
            </li>
            <li class="nav-item">
              <a href="{!! route('client-new') !!}" class="nav-link"><i class="icon-user-plus"></i> Dar de alta</a>
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
  <a href="{!! route('client-new') !!}" class="btn btn-success">Nuevo cliente</a>
@endsection

@section('breadcrumbs')
  <div class="d-flex">
    <div class="breadcrumb">
      <a href="{!! route('home') !!}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Inicio</a>
      <a href="" class="breadcrumb-item">Clientes</a>
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

	<!-- Orders history (static table) -->
	<div class="card">
		<div class="card-header bg-transparent header-elements-inline">
			<h6 class="card-title">Orders history (static table)</h6>
			<div class="header-elements">
				<div class="list-icons">
									<a class="list-icons-item" data-action="collapse"></a>
									<a class="list-icons-item" data-action="reload"></a>
									<a class="list-icons-item" data-action="remove"></a>
								</div>
							</div>
		</div>

		<div class="table-responsive">
			<table class="table text-nowrap">
				<thead>
					<tr>
						<th colspan="2">Product name</th>
						<th>Size</th>
						<th>Colour</th>
						<th>Article number</th>
						<th>Units</th>
						<th>Price</th>
						<th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
					</tr>
				</thead>
				<tbody>
					<tr class="table-active">
						<td colspan="7" class="font-weight-semibold">New orders</td>
						<td class="text-right">
							<span class="badge bg-secondary badge-pill">24</span>
						</td>
					</tr>

					<tr>
						<td class="pr-0" style="width: 45px;">
							<a href="#">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>
						</td>
						<td>
							<a href="#" class="font-weight-semibold">Fathom Backpack</a>
							<div class="text-muted font-size-sm">
								<span class="badge badge-mark bg-grey border-grey mr-1"></span>
								Processing
							</div>
						</td>
						<td>34cm x 29cm</td>
						<td>Orange</td>
						<td>
							<a href="#">1237749</a>
						</td>
						<td>1</td>
						<td>
							<h6 class="mb-0 font-weight-semibold">&euro; 79.00</h6>
						</td>
						<td class="text-center">
							<div class="list-icons">
								<div class="list-icons-item dropdown">
									<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
										<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
										<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
									</div>
								</div>
							</div>
						</td>
					</tr>

					<tr>
						<td class="pr-0">
							<a href="#">
							<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>
						</td>
						<td>
							<a href="#" class="font-weight-semibold">Mystery Air Long Sleeve T Shirt</a>
							<div class="text-muted font-size-sm">
								<span class="badge badge-mark bg-grey border-grey mr-1"></span>
								Processing
							</div>
						</td>
						<td>L</td>
						<td>Process Red</td>
						<td>
							<a href="#">345634</a>
						</td>
						<td>1</td>
						<td>
							<h6 class="mb-0 font-weight-semibold">&euro; 38.00</h6>
						</td>
						<td class="text-center">
							<div class="list-icons">
								<div class="list-icons-item dropdown">
									<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
										<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
										<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
									</div>
								</div>
							</div>
						</td>
					</tr>

					<tr>
						<td class="pr-0">
							<a href="#">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>
						</td>
						<td>
							<a href="#" class="font-weight-semibold">Women’s Prospect Backpack</a>
							<div class="text-muted font-size-sm">
								<span class="badge badge-mark bg-grey border-grey mr-1"></span>
								Processing
							</div>
						</td>
						<td>46cm x 28cm</td>
						<td>Neu Nordic Print</td>
						<td>
							<a href="#">5739584</a>
						</td>
						<td>1</td>
						<td>
							<h6 class="mb-0 font-weight-semibold">&euro; 60.00</h6>
						</td>
						<td class="text-center">
							<div class="list-icons">
								<div class="list-icons-item dropdown">
									<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
										<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
										<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
									</div>
								</div>
							</div>
						</td>
					</tr>

					<tr>
						<td class="pr-0">
							<a href="#">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>
						</td>
						<td>
							<a href="#" class="font-weight-semibold">Overlook Short Sleeve T Shirt</a>
							<div class="text-muted font-size-sm">
								<span class="badge badge-mark bg-grey border-grey mr-1"></span>
								Processing
							</div>
						</td>
						<td>M</td>
						<td>Gray Heather</td>
						<td>
							<a href="#">434450</a>
						</td>
						<td>1</td>
						<td>
							<h6 class="mb-0 font-weight-semibold">&euro; 35.00</h6>
						</td>
						<td class="text-center">
							<div class="list-icons">
								<div class="list-icons-item dropdown">
									<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
										<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
										<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
									</div>
								</div>
							</div>
						</td>
					</tr>

					<tr class="table-active">
						<td colspan="7" class="font-weight-semibold">Shipped orders</td>
						<td class="text-right">
							<span class="badge bg-success badge-pill">42</span>
						</td>
					</tr>

					<tr>
						<td class="pr-0">
							<a href="#">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>
						</td>
						<td>
							<a href="#" class="font-weight-semibold">Infinite Ride Liner</a>
							<div class="text-muted font-size-sm">
								<span class="badge badge-mark bg-success border-success mr-1"></span>
								Shipped
							</div>
						</td>
						<td>43</td>
						<td>Black</td>
						<td>
							<a href="#">34739</a>
						</td>
						<td>1</td>
						<td>
							<h6 class="mb-0 font-weight-semibold">&euro; 210.00</h6>
						</td>
						<td class="text-center">
							<div class="list-icons">
								<div class="list-icons-item dropdown">
									<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
										<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
										<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
									</div>
								</div>
							</div>
						</td>
					</tr>

					<tr>
						<td class="pr-0">
							<a href="#">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>
						</td>
						<td>
							<a href="#" class="font-weight-semibold">Custom Snowboard</a>
							<div class="text-muted font-size-sm">
								<span class="badge badge-mark bg-success border-success mr-1"></span>
								Shipped
							</div>
						</td>
						<td>151</td>
						<td>Black/Blue</td>
						<td>
							<a href="#">5574832</a>
						</td>
						<td>1</td>
						<td>
							<h6 class="mb-0 font-weight-semibold">&euro; 600.00</h6>
						</td>
						<td class="text-center">
							<div class="list-icons">
								<div class="list-icons-item dropdown">
									<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
										<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
										<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
									</div>
								</div>
							</div>
						</td>
					</tr>

					<tr>
						<td class="pr-0">
							<a href="#">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>
						</td>
						<td>
							<a href="#" class="font-weight-semibold">Kids' Day Hiker 20L Backpack</a>
							<div class="text-muted font-size-sm">
								<span class="badge badge-mark bg-success border-success mr-1"></span>
								Shipped
							</div>
						</td>
						<td>24cm x 29cm</td>
						<td>Figaro Stripe</td>
						<td>
							<a href="#">6684902</a>
						</td>
						<td>1</td>
						<td>
							<h6 class="mb-0 font-weight-semibold">&euro; 55.00</h6>
						</td>
						<td class="text-center">
							<div class="list-icons">
								<div class="list-icons-item dropdown">
									<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
										<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
										<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
									</div>
								</div>
							</div>
						</td>
					</tr>

					<tr>
						<td class="pr-0">
							<a href="#">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>
						</td>
						<td>
							<a href="#" class="font-weight-semibold">Lunch Sack</a>
							<div class="text-muted font-size-sm">
								<span class="badge badge-mark bg-success border-success mr-1"></span>
								Shipped
							</div>
						</td>
						<td>24cm x 20cm</td>
						<td>Junk Food Print</td>
						<td>
							<a href="#">5574829</a>
						</td>
						<td>1</td>
						<td>
							<h6 class="mb-0 font-weight-semibold">&euro; 20.00</h6>
						</td>
						<td class="text-center">
							<div class="list-icons">
								<div class="list-icons-item dropdown">
									<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
										<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
										<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
									</div>
								</div>
							</div>
						</td>
					</tr>

					<tr>
						<td class="pr-0">
							<a href="#">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>
						</td>
						<td>
							<a href="#" class="font-weight-semibold">Cambridge Jacket</a>
							<div class="text-muted font-size-sm">
								<span class="badge badge-mark bg-success border-success mr-1"></span>
								Shipped
							</div>
						</td>
						<td>XL</td>
						<td>Nomad/Railroad</td>
						<td>
							<a href="#">475839</a>
						</td>
						<td>1</td>
						<td>
							<h6 class="mb-0 font-weight-semibold">&euro; 175.00</h6>
						</td>
						<td class="text-center">
							<div class="list-icons">
								<div class="list-icons-item dropdown">
									<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
										<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
										<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
									</div>
								</div>
							</div>
						</td>
					</tr>

					<tr>
						<td class="pr-0">
							<a href="#">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>
						</td>
						<td>
							<a href="#" class="font-weight-semibold">Covert Jacket</a>
							<div class="text-muted font-size-sm">
								<span class="badge badge-mark bg-success border-success mr-1"></span>
								Shipped
							</div>
						</td>
						<td>XXL</td>
						<td>Mocha/Glacier Sierra</td>
						<td>
							<a href="#">589439</a>
						</td>
						<td>1</td>
						<td>
							<h6 class="mb-0 font-weight-semibold">&euro; 126.00</h6>
						</td>
						<td class="text-center">
							<div class="list-icons">
								<div class="list-icons-item dropdown">
									<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
										<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
										<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
									</div>
								</div>
							</div>
						</td>
					</tr>

					<tr class="table-active">
						<td colspan="7" class="font-weight-semibold">Cancelled orders</td>
						<td class="text-right">
							<span class="badge bg-danger badge-pill">9</span>
						</td>
					</tr>

					<tr>
						<td class="pr-0">
							<a href="#">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>
						</td>
						<td>
							<a href="#" class="font-weight-semibold">Day Hiker Pinnacle 31L Backpack</a>
							<div class="text-muted font-size-sm">
								<span class="badge badge-mark bg-danger border-danger mr-1"></span>
								Cancelled
							</div>
						</td>
						<td>42cm x 26.5cm</td>
						<td>Blotto Ripstop</td>
						<td>
							<a href="#">5849305</a>
						</td>
						<td>1</td>
						<td>
							<h6 class="mb-0 font-weight-semibold">&euro; 130.00</h6>
						</td>
						<td class="text-center">
							<div class="list-icons">
								<div class="list-icons-item dropdown">
									<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
										<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
										<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
									</div>
								</div>
							</div>
						</td>
					</tr>

					<tr>
						<td class="pr-0">
							<a href="#">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>
						</td>
						<td>
							<a href="#" class="font-weight-semibold">Kids' Gromlet Backpack</a>
							<div class="text-muted font-size-sm">
								<span class="badge badge-mark bg-danger border-danger mr-1"></span>
								Cancelled
							</div>
						</td>
						<td>22cm x 20cm</td>
						<td>Slime Camo Print</td>
						<td>
							<a href="#">4438495</a>
						</td>
						<td>1</td>
						<td>
							<h6 class="mb-0 font-weight-semibold">&euro; 35.00</h6>
						</td>
						<td class="text-center">
							<div class="list-icons">
								<div class="list-icons-item dropdown">
									<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
										<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
										<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
									</div>
								</div>
							</div>
						</td>
					</tr>

					<tr>
						<td class="pr-0">
							<a href="#">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>
						</td>
						<td>
							<a href="#" class="font-weight-semibold">Tinder Backpack</a>
							<div class="text-muted font-size-sm">
								<span class="badge badge-mark bg-danger border-danger mr-1"></span>
								Cancelled
							</div>
						</td>
						<td>42cm x 26cm</td>
						<td>Dark Tide Twill</td>
						<td>
							<a href="#">4759383</a>
						</td>
						<td>2</td>
						<td>
							<h6 class="mb-0 font-weight-semibold">&euro; 180.00</h6>
						</td>
						<td class="text-center">
							<div class="list-icons">
								<div class="list-icons-item dropdown">
									<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
										<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
										<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
									</div>
								</div>
							</div>
						</td>
					</tr>

					<tr>
						<td class="pr-0">
							<a href="#">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>
						</td>
						<td>
							<a href="#" class="font-weight-semibold">Almighty Snowboard Boot</a>
							<div class="text-muted font-size-sm">
								<span class="badge badge-mark bg-danger border-danger mr-1"></span>
								Cancelled
							</div>
						</td>
						<td>45</td>
						<td>Multiweave</td>
						<td>
							<a href="#">34432</a>
						</td>
						<td>1</td>
						<td>
							<h6 class="mb-0 font-weight-semibold">&euro; 370.00</h6>
						</td>
						<td class="text-center">
							<div class="list-icons">
								<div class="list-icons-item dropdown">
									<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
										<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
										<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
									</div>
								</div>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<!-- /orders history (static table) -->


	<!-- Orders history (datatable) -->
	<div class="card">
		<div class="card-header bg-transparent header-elements-inline">
			<h6 class="card-title">Orders history (Datatable)</h6>
			<div class="header-elements">
				<div class="list-icons">
									<a class="list-icons-item" data-action="collapse"></a>
									<a class="list-icons-item" data-action="reload"></a>
									<a class="list-icons-item" data-action="remove"></a>
								</div>
							</div>
		</div>

		<table class="table table-orders-history text-nowrap">
			<thead>
				<tr>
					<th>Status</th>
					<th>Product name</th>
					<th>Size</th>
					<th>Colour</th>
					<th>Article number</th>
					<th>Units</th>
					<th>Price</th>
					<th class="text-center"><i class="icon-arrow-down12"></i></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1. New orders</td>
					<td>
						<div class="media">
							<a href="#" class="mr-3">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>

							<div class="media-body align-self-center">
								<a href="#" class="font-weight-semibold">Fathom Backpack</a>
								<div class="text-muted font-size-sm">
									<span class="badge badge-mark bg-grey border-grey mr-1"></span>
									Processing
								</div>
							</div>
						</div>
					</td>
					<td>34cm x 29cm</td>
					<td>Orange</td>
					<td>
						<a href="#">1237749</a>
					</td>
					<td>1</td>
					<td>
						<h6 class="mb-0 font-weight-semibold">&euro; 79.00</h6>
					</td>
					<td class="text-center">
						<div class="list-icons">
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
									<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
								</div>
							</div>
						</div>
					</td>
				</tr>

				<tr>
					<td>1. New orders</td>
					<td>
						<div class="media">
							<a href="#" class="mr-3">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>

							<div class="media-body align-self-center">
								<a href="#" class="font-weight-semibold">Mystery Air Long Sleeve T Shirt</a>
								<div class="text-muted font-size-sm">
									<span class="badge badge-mark bg-grey border-grey mr-1"></span>
									Processing
								</div>
							</div>
						</div>
					</td>
					<td>L</td>
					<td>Process Red</td>
					<td>
						<a href="#">345634</a>
					</td>
					<td>1</td>
					<td>
						<h6 class="mb-0 font-weight-semibold">&euro; 38.00</h6>
					</td>
					<td class="text-center">
						<div class="list-icons">
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
									<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
								</div>
							</div>
						</div>
					</td>
				</tr>

				<tr>
					<td>1. New orders</td>
					<td>
						<div class="media">
							<a href="#" class="mr-3">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>

							<div class="media-body align-self-center">
								<a href="#" class="font-weight-semibold">Women’s Prospect Backpack</a>
								<div class="text-muted font-size-sm">
									<span class="badge badge-mark bg-grey border-grey mr-1"></span>
									Processing
								</div>
							</div>
						</div>
					</td>
					<td>46cm x 28cm</td>
					<td>Neu Nordic Print</td>
					<td>
						<a href="#">5739584</a>
					</td>
					<td>1</td>
					<td>
						<h6 class="mb-0 font-weight-semibold">&euro; 60.00</h6>
					</td>
					<td class="text-center">
						<div class="list-icons">
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
									<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
								</div>
							</div>
						</div>
					</td>
				</tr>

				<tr>
					<td>1. New orders</td>
					<td>
						<div class="media">
							<a href="#" class="mr-3">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>

							<div class="media-body align-self-center">
								<a href="#" class="font-weight-semibold">Overlook Short Sleeve T Shirt</a>
								<div class="text-muted font-size-sm">
									<span class="badge badge-mark bg-grey border-grey mr-1"></span>
									Processing
								</div>
							</div>
						</div>
					</td>
					<td>M</td>
					<td>Gray Heather</td>
					<td>
						<a href="#">434450</a>
					</td>
					<td>1</td>
					<td>
						<h6 class="mb-0 font-weight-semibold">&euro; 35.00</h6>
					</td>
					<td class="text-center">
						<div class="list-icons">
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
									<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
								</div>
							</div>
						</div>
					</td>
				</tr>

				<tr>
					<td>2. Shipped orders</td>
					<td>
						<div class="media">
							<a href="#" class="mr-3">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>

							<div class="media-body align-self-center">
								<a href="#" class="font-weight-semibold">Infinite Ride Liner</a>
								<div class="text-muted font-size-sm">
									<span class="badge badge-mark bg-success border-success mr-1"></span>
									Shipped
								</div>
							</div>
						</div>
					</td>
					<td>43</td>
					<td>Black</td>
					<td>
						<a href="#">34739</a>
					</td>
					<td>1</td>
					<td>
						<h6 class="mb-0 font-weight-semibold">&euro; 210.00</h6>
					</td>
					<td class="text-center">
						<div class="list-icons">
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
									<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
								</div>
							</div>
						</div>
					</td>
				</tr>

				<tr>
					<td>2. Shipped orders</td>
					<td>
						<div class="media">
							<a href="#" class="mr-3">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>

							<div class="media-body align-self-center">
								<a href="#" class="font-weight-semibold">Custom Snowboard</a>
								<div class="text-muted font-size-sm">
									<span class="badge badge-mark bg-success border-success mr-1"></span>
									Shipped
								</div>
							</div>
						</div>
					</td>
					<td>151</td>
					<td>Black/Blue</td>
					<td>
						<a href="#">5574832</a>
					</td>
					<td>1</td>
					<td>
						<h6 class="mb-0 font-weight-semibold">&euro; 600.00</h6>
					</td>
					<td class="text-center">
						<div class="list-icons">
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
									<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
								</div>
							</div>
						</div>
					</td>
				</tr>

				<tr>
					<td>2. Shipped orders</td>
					<td>
						<div class="media">
							<a href="#" class="mr-3">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>

							<div class="media-body align-self-center">
								<a href="#" class="font-weight-semibold">Kids' Day Hiker 20L Backpack</a>
								<div class="text-muted font-size-sm">
									<span class="badge badge-mark bg-success border-success mr-1"></span>
									Shipped
								</div>
							</div>
						</div>
					</td>
					<td>24cm x 29cm</td>
					<td>Figaro Stripe</td>
					<td>
						<a href="#">6684902</a>
					</td>
					<td>1</td>
					<td>
						<h6 class="mb-0 font-weight-semibold">&euro; 55.00</h6>
					</td>
					<td class="text-center">
						<div class="list-icons">
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
									<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
								</div>
							</div>
						</div>
					</td>
				</tr>

				<tr>
					<td>2. Shipped orders</td>
					<td>
						<div class="media">
							<a href="#" class="mr-3">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>

							<div class="media-body align-self-center">
								<a href="#" class="font-weight-semibold">Lunch Sack</a>
								<div class="text-muted font-size-sm">
									<span class="badge badge-mark bg-success border-success mr-1"></span>
									Shipped
								</div>
							</div>
						</div>
					</td>
					<td>24cm x 20cm</td>
					<td>Junk Food Print</td>
					<td>
						<a href="#">5574829</a>
					</td>
					<td>1</td>
					<td>
						<h6 class="mb-0 font-weight-semibold">&euro; 20.00</h6>
					</td>
					<td class="text-center">
						<div class="list-icons">
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
									<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
								</div>
							</div>
						</div>
					</td>
				</tr>

				<tr>
					<td>2. Shipped orders</td>
					<td>
						<div class="media">
							<a href="#" class="mr-3">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>

							<div class="media-body align-self-center">
								<a href="#" class="font-weight-semibold">Cambridge Jacket</a>
								<div class="text-muted font-size-sm">
									<span class="badge badge-mark bg-success border-success mr-1"></span>
									Shipped
								</div>
							</div>
						</div>
					</td>
					<td>XL</td>
					<td>Nomad/Railroad</td>
					<td>
						<a href="#">475839</a>
					</td>
					<td>1</td>
					<td>
						<h6 class="mb-0 font-weight-semibold">&euro; 175.00</h6>
					</td>
					<td class="text-center">
						<div class="list-icons">
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
									<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
								</div>
							</div>
						</div>
					</td>
				</tr>

				<tr>
					<td>2. Shipped orders</td>
					<td>
						<div class="media">
							<a href="#" class="mr-3">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>

							<div class="media-body align-self-center">
								<a href="#" class="font-weight-semibold">Covert Jacket</a>
								<div class="text-muted font-size-sm">
									<span class="badge badge-mark bg-success border-success mr-1"></span>
									Shipped
								</div>
							</div>
						</div>
					</td>
					<td>XXL</td>
					<td>Mocha/Glacier Sierra</td>
					<td>
						<a href="#">589439</a>
					</td>
					<td>1</td>
					<td>
						<h6 class="mb-0 font-weight-semibold">&euro; 126.00</h6>
					</td>
					<td class="text-center">
						<div class="list-icons">
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
									<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
								</div>
							</div>
						</div>
					</td>
				</tr>

				<tr>
					<td>3. Cancelled orders</td>
					<td>
						<div class="media">
							<a href="#" class="mr-3">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>

							<div class="media-body align-self-center">
								<a href="#" class="font-weight-semibold">Day Hiker Pinnacle 31L Backpack</a>
								<div class="text-muted font-size-sm">
									<span class="badge badge-mark bg-danger border-danger mr-1"></span>
									Cancelled
								</div>
							</div>
						</div>
					</td>
					<td>42cm x 26.5cm</td>
					<td>Blotto Ripstop</td>
					<td>
						<a href="#">5849305</a>
					</td>
					<td>1</td>
					<td>
						<h6 class="mb-0 font-weight-semibold">&euro; 130.00</h6>
					</td>
					<td class="text-center">
						<div class="list-icons">
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
									<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
								</div>
							</div>
						</div>
					</td>
				</tr>

				<tr>
					<td>3. Cancelled orders</td>
					<td>
						<div class="media">
							<a href="#" class="mr-3">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>

							<div class="media-body align-self-center">
								<a href="#" class="font-weight-semibold">Kids' Gromlet Backpack</a>
								<div class="text-muted font-size-sm">
									<span class="badge badge-mark bg-danger border-danger mr-1"></span>
									Cancelled
								</div>
							</div>
						</div>
					</td>
					<td>22cm x 20cm</td>
					<td>Slime Camo Print</td>
					<td>
						<a href="#">4438495</a>
					</td>
					<td>1</td>
					<td>
						<h6 class="mb-0 font-weight-semibold">&euro; 35.00</h6>
					</td>
					<td class="text-center">
						<div class="list-icons">
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
									<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
								</div>
							</div>
						</div>
					</td>
				</tr>

				<tr>
					<td>3. Cancelled orders</td>
					<td>
						<div class="media">
							<a href="#" class="mr-3">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>

							<div class="media-body align-self-center">
								<a href="#" class="font-weight-semibold">Tinder Backpack</a>
								<div class="text-muted font-size-sm">
									<span class="badge badge-mark bg-danger border-danger mr-1"></span>
									Cancelled
								</div>
							</div>
						</div>
					</td>
					<td>42cm x 26cm</td>
					<td>Dark Tide Twill</td>
					<td>
						<a href="#">4759383</a>
					</td>
					<td>2</td>
					<td>
						<h6 class="mb-0 font-weight-semibold">&euro; 180.00</h6>
					</td>
					<td class="text-center">
						<div class="list-icons">
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
									<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
								</div>
							</div>
						</div>
					</td>
				</tr>

				<tr>
					<td>3. Cancelled orders</td>
					<td>
						<div class="media">
							<a href="#" class="mr-3">
								<img src="../../../../global_assets/images/placeholders/placeholder.jpg" height="60" alt="">
							</a>

							<div class="media-body align-self-center">
								<a href="#" class="font-weight-semibold">Almighty Snowboard Boot</a>
								<div class="text-muted font-size-sm">
									<span class="badge badge-mark bg-danger border-danger mr-1"></span>
									Cancelled
								</div>
							</div>
						</div>
					</td>
					<td>45</td>
					<td>Multiweave</td>
					<td>
						<a href="#">34432</a>
					</td>
					<td>1</td>
					<td>
						<h6 class="mb-0 font-weight-semibold">&euro; 370.00</h6>
					</td>
					<td class="text-center">
						<div class="list-icons">
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item" data-toggle="dropdown"><i class="icon-menu7"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-truck"></i> Track parcel</a>
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download invoice</a>
									<a href="#" class="dropdown-item"><i class="icon-wallet"></i> Payment details</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-warning2"></i> Report problem</a>
								</div>
							</div>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<!-- /orders history (datatable) -->

@endsection
