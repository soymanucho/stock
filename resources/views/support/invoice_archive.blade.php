
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

	<!-- Invoice archive -->
	<div class="card">
		<div class="card-header bg-transparent header-elements-inline">
			<h6 class="card-title">Invoice archive</h6>
			<div class="header-elements">
				<div class="list-icons">
									<a class="list-icons-item" data-action="collapse"></a>
									<a class="list-icons-item" data-action="reload"></a>
									<a class="list-icons-item" data-action="remove"></a>
								</div>
							</div>
		</div>

		<table class="table table-lg invoice-archive">
			<thead>
				<tr>
					<th>#</th>
					<th>Period</th>
									<th>Issued to</th>
									<th>Status</th>
									<th>Issue date</th>
									<th>Due date</th>
									<th>Amount</th>
									<th class="text-center">Actions</th>
							</tr>
			</thead>
			<tbody>
				<tr>
					<td>#0025</td>
					<td>February 2015</td>
									<td>
										<h6 class="mb-0">
											<a href="#">Rebecca Manes</a>
											<span class="d-block font-size-sm text-muted">Payment method: Skrill</span>
										</h6>
									</td>
									<td>
										<select name="status" class="form-control form-control-select2" data-placeholder="Select status">
											<option value="overdue">Overdue</option>
											<option value="hold" selected>On hold</option>
											<option value="pending">Pending</option>
											<option value="paid">Paid</option>
											<option value="invalid">Invalid</option>
											<option value="cancel">Canceled</option>
										</select>
									</td>
									<td>
										April 18, 2015
									</td>
									<td>
										<span class="badge badge-success">Paid on Mar 16, 2015</span>
									</td>
									<td>
										<h6 class="mb-0 font-weight-bold">$17,890 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $4,890</span></h6>
									</td>
					<td class="text-center">
						<div class="list-icons list-icons-extended">
							<a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
									<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
									<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
								</div>
							</div>
						</div>
					</td>
							</tr>

				<tr>
					<td>#0024</td>
					<td>February 2015</td>
									<td>
										<h6 class="mb-0">
											<a href="#">James Alexander</a>
											<span class="d-block font-size-sm text-muted">Payment method: Wire transfer</span>
										</h6>
									</td>
									<td>
										<select name="status" class="form-control form-control-select2" data-placeholder="Select status">
											<option value="overdue">Overdue</option>
											<option value="hold">On hold</option>
											<option value="pending">Pending</option>
											<option value="paid" selected>Paid</option>
											<option value="invalid">Invalid</option>
											<option value="cancel">Canceled</option>
										</select>
									</td>
									<td>
										April 17, 2015
									</td>
									<td>
										<span class="badge badge-warning">5 days</span>
									</td>
									<td>
										<h6 class="mb-0 font-weight-bold">$2,769 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $2,839</span></h6>
									</td>
					<td class="text-center">
						<div class="list-icons list-icons-extended">
							<a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
									<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
									<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
								</div>
							</div>
						</div>
					</td>
							</tr>

				<tr>
					<td>#0023</td>
					<td>February 2015</td>
									<td>
										<h6 class="mb-0">
											<a href="#">Jeremy Victorino</a>
											<span class="d-block font-size-sm text-muted">Payment method: Payoneer</span>
										</h6>
									</td>
									<td>
										<select name="status" class="form-control form-control-select2" data-placeholder="Select status">
											<option value="overdue">Overdue</option>
											<option value="hold">On hold</option>
											<option value="pending">Pending</option>
											<option value="paid" selected>Paid</option>
											<option value="invalid">Invalid</option>
											<option value="cancel">Canceled</option>
										</select>
									</td>
									<td>
										April 17, 2015
									</td>
									<td>
										<span class="badge badge-primary">27 days</span>
									</td>
									<td>
										<h6 class="mb-0 font-weight-bold">$1,500 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $1,984</span></h6>
									</td>
					<td class="text-center">
						<div class="list-icons list-icons-extended">
							<a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
									<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
									<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
								</div>
							</div>
						</div>
					</td>
							</tr>

				<tr>
					<td>#0022</td>
					<td>January 2015</td>
									<td>
										<h6 class="mb-0">
											<a href="#">Margo Baker</a>
											<span class="d-block font-size-sm text-muted">Payment method: Paypal</span>
										</h6>
									</td>
									<td>
										<select name="status" class="form-control form-control-select2" data-placeholder="Select status">
											<option value="overdue">Overdue</option>
											<option value="hold">On hold</option>
											<option value="pending">Pending</option>
											<option value="paid">Paid</option>
											<option value="invalid">Invalid</option>
											<option value="cancel" selected>Canceled</option>
										</select>
									</td>
									<td>
										January 15, 2015
									</td>
									<td>
										<span class="badge badge-primary">12 days</span>
									</td>
									<td>
										<h6 class="mb-0 font-weight-bold">$4,580 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $992</span></h6>
									</td>
					<td class="text-center">
						<div class="list-icons list-icons-extended">
							<a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
									<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
									<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
								</div>
							</div>
						</div>
					</td>
							</tr>

				<tr>
					<td>#0021</td>
					<td>January 2015</td>
									<td>
										<h6 class="mb-0">
											<a href="#">Beatrix Diaz</a>
											<span class="d-block font-size-sm text-muted">Payment method: Paypal</span>
										</h6>
									</td>
									<td>
										<select name="status" class="form-control form-control-select2" data-placeholder="Select status">
											<option value="overdue" selected>Overdue</option>
											<option value="hold">On hold</option>
											<option value="pending">Pending</option>
											<option value="paid">Paid</option>
											<option value="invalid">Invalid</option>
											<option value="cancel">Canceled</option>
										</select>
									</td>
									<td>
										January 10, 2015
									</td>
									<td>
										<span class="badge badge-danger">- 3 days</span>
									</td>
									<td>
										<h6 class="mb-0 font-weight-bold">$7,990 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $1,294</span></h6>
									</td>
					<td class="text-center">
						<div class="list-icons list-icons-extended">
							<a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
									<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
									<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
								</div>
							</div>
						</div>
					</td>
							</tr>

				<tr>
					<td>#0020</td>
					<td>January 2015</td>
									<td>
										<h6 class="mb-0">
											<a href="#">Richard Vango</a>
											<span class="d-block font-size-sm text-muted">Payment method: Wire transfer</span>
										</h6>
									</td>
									<td>
										<select name="status" class="form-control form-control-select2" data-placeholder="Select status">
											<option value="overdue">Overdue</option>
											<option value="hold">On hold</option>
											<option value="pending">Pending</option>
											<option value="paid">Paid</option>
											<option value="invalid" selected>Invalid</option>
											<option value="cancel">Canceled</option>
										</select>
									</td>
									<td>
										January 10, 2015
									</td>
									<td>
										<span class="badge badge-secondary">On hold</span>
									</td>
									<td>
										<h6 class="mb-0 font-weight-bold">$12,120 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $3,278</span></h6>
									</td>
					<td class="text-center">
						<div class="list-icons list-icons-extended">
							<a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
									<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
									<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
								</div>
							</div>
						</div>
					</td>
							</tr>

				<tr>
					<td>#0019</td>
					<td>January 2015</td>
									<td>
										<h6 class="mb-0">
											<a href="#">Will Baker</a>
											<span class="d-block font-size-sm text-muted">Payment method: Paypal</span>
										</h6>
									</td>
									<td>
										<select name="status" class="form-control form-control-select2" data-placeholder="Select status">
											<option value="overdue">Overdue</option>
											<option value="hold" selected>On hold</option>
											<option value="pending">Pending</option>
											<option value="paid">Paid</option>
											<option value="invalid">Invalid</option>
											<option value="cancel">Canceled</option>
										</select>
									</td>
									<td>
										December 26, 2014
									</td>
									<td>
										<span class="badge badge-success">Paid on Feb 25, 2015</span>
									</td>
									<td>
										<h6 class="mb-0 font-weight-bold">$5,390 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $2,880</span></h6>
									</td>
					<td class="text-center">
						<div class="list-icons list-icons-extended">
							<a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
									<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
									<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
								</div>
							</div>
						</div>
					</td>
							</tr>

				<tr>
					<td>#0018</td>
					<td>January 2015</td>
									<td>
										<h6 class="mb-0">
											<a href="#">Joseph Mills</a>
											<span class="d-block font-size-sm text-muted">Payment method: Skrill</span>
										</h6>
									</td>
									<td>
										<select name="status" class="form-control form-control-select2" data-placeholder="Select status">
											<option value="overdue">Overdue</option>
											<option value="hold">On hold</option>
											<option value="pending" selected>Pending</option>
											<option value="paid">Paid</option>
											<option value="invalid">Invalid</option>
											<option value="cancel">Canceled</option>
										</select>
									</td>
									<td>
										June 17, 2015
									</td>
									<td>
										<span class="badge badge-secondary">On hold</span>
									</td>
									<td>
										<h6 class="mb-0 font-weight-bold">$10,280 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $2,190</span></h6>
									</td>
					<td class="text-center">
						<div class="list-icons list-icons-extended">
							<a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
									<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
									<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
								</div>
							</div>
						</div>
					</td>
							</tr>

				<tr>
					<td>#0017</td>
					<td>December 2014</td>
									<td>
										<h6 class="mb-0">
											<a href="#">Buzz Brenson</a>
											<span class="d-block font-size-sm text-muted">Payment method: Wire transfer</span>
										</h6>
									</td>
									<td>
										<select name="status" class="form-control form-control-select2" data-placeholder="Select status">
											<option value="overdue">Overdue</option>
											<option value="hold">On hold</option>
											<option value="pending" selected>Pending</option>
											<option value="paid">Paid</option>
											<option value="invalid">Invalid</option>
											<option value="cancel">Canceled</option>
										</select>
									</td>
									<td>
										May 6, 2015
									</td>
									<td>
										<span class="badge badge-warning">2 days</span>
									</td>
									<td>
										<h6 class="mb-0 font-weight-bold">$43,320 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $1,299</span></h6>
									</td>
					<td class="text-center">
						<div class="list-icons list-icons-extended">
							<a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
									<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
									<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
								</div>
							</div>
						</div>
					</td>
							</tr>

				<tr>
					<td>#0016</td>
					<td>December 2014</td>
									<td>
										<h6 class="mb-0">
											<a href="#">Zachary Willson</a>
											<span class="d-block font-size-sm text-muted">Payment method: Paypal</span>
										</h6>
									</td>
									<td>
										<select name="status" class="form-control form-control-select2" data-placeholder="Select status">
											<option value="overdue" selected>Overdue</option>
											<option value="hold">On hold</option>
											<option value="pending">Pending</option>
											<option value="paid">Paid</option>
											<option value="invalid">Invalid</option>
											<option value="cancel">Canceled</option>
										</select>
									</td>
									<td>
										March 7, 2015
									</td>
									<td>
										<span class="badge badge-primary">15 days</span>
									</td>
									<td>
										<h6 class="mb-0 font-weight-bold">$7,100 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $1,450</span></h6>
									</td>
					<td class="text-center">
						<div class="list-icons list-icons-extended">
							<a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
									<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
									<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
								</div>
							</div>
						</div>
					</td>
							</tr>

				<tr>
					<td>#0015</td>
					<td>December 2014</td>
									<td>
										<h6 class="mb-0">
											<a href="#">Bastian Miller</a>
											<span class="d-block font-size-sm text-muted">Payment method: Payoneer</span>
										</h6>
									</td>
									<td>
										<select name="status" class="form-control form-control-select2" data-placeholder="Select status">
											<option value="overdue">Overdue</option>
											<option value="hold">On hold</option>
											<option value="pending">Pending</option>
											<option value="paid">Paid</option>
											<option value="invalid" selected>Invalid</option>
											<option value="cancel">Canceled</option>
										</select>
									</td>
									<td>
										March 23, 2015
									</td>
									<td>
										<span class="badge badge-warning">6 days</span>
									</td>
									<td>
										<h6 class="mb-0 font-weight-bold">$1,030 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $229</span></h6>
									</td>
					<td class="text-center">
						<div class="list-icons list-icons-extended">
							<a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
									<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
									<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
								</div>
							</div>
						</div>
					</td>
							</tr>

				<tr>
					<td>#0014</td>
					<td>December 2014</td>
									<td>
										<h6 class="mb-0">
											<a href="#">William Samuel</a>
											<span class="d-block font-size-sm text-muted">Payment method: Paypal</span>
										</h6>
									</td>
									<td>
										<select name="status" class="form-control form-control-select2" data-placeholder="Select status">
											<option value="overdue">Overdue</option>
											<option value="hold">On hold</option>
											<option value="pending">Pending</option>
											<option value="paid">Paid</option>
											<option value="invalid">Invalid</option>
											<option value="cancel" selected>Canceled</option>
										</select>
									</td>
									<td>
										March 2, 2015
									</td>
									<td>
										<span class="badge badge-secondary">On hold</span>
									</td>
									<td>
										<h6 class="mb-0 font-weight-bold">$800 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $189</span></h6>
									</td>
					<td class="text-center">
						<div class="list-icons list-icons-extended">
							<a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
									<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
									<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
								</div>
							</div>
						</div>
					</td>
							</tr>

				<tr>
					<td>#0013</td>
					<td>November 2014</td>
									<td>
										<h6 class="mb-0">
											<a href="#">Monica Smith</a>
											<span class="d-block font-size-sm text-muted">Payment method: Wire transfer</span>
										</h6>
									</td>
									<td>
										<select name="status" class="form-control form-control-select2" data-placeholder="Select status">
											<option value="overdue">Overdue</option>
											<option value="hold">On hold</option>
											<option value="pending" selected>Pending</option>
											<option value="paid">Paid</option>
											<option value="invalid">Invalid</option>
											<option value="cancel">Canceled</option>
										</select>
									</td>
									<td>
										February 25, 2015
									</td>
									<td>
										<span class="badge badge-success">Paid on Feb 15, 2015</span>
									</td>
									<td>
										<h6 class="mb-0 font-weight-bold">$6,300 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $1,200</span></h6>
									</td>
					<td class="text-center">
						<div class="list-icons list-icons-extended">
							<a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
									<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
									<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
								</div>
							</div>
						</div>
					</td>
							</tr>

				<tr>
					<td>#0012</td>
					<td>November 2014</td>
									<td>
										<h6 class="mb-0">
											<a href="#">Jordana Miles</a>
											<span class="d-block font-size-sm text-muted">Payment method: Paypal</span>
										</h6>
									</td>
									<td>
										<select name="status" class="form-control form-control-select2" data-placeholder="Select status">
											<option value="overdue">Overdue</option>
											<option value="hold">On hold</option>
											<option value="pending">Pending</option>
											<option value="paid" selected>Paid</option>
											<option value="invalid">Invalid</option>
											<option value="cancel">Canceled</option>
										</select>
									</td>
									<td>
										February 26, 2015
									</td>
									<td>
										<span class="badge badge-primary">12 days</span>
									</td>
									<td>
										<h6 class="mb-0 font-weight-bold">$2,200 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $689</span></h6>
									</td>
					<td class="text-center">
						<div class="list-icons list-icons-extended">
							<a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
									<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
									<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
								</div>
							</div>
						</div>
					</td>
							</tr>

				<tr>
					<td>#0011</td>
					<td>November 2014</td>
									<td>
										<h6 class="mb-0">
											<a href="#">John Craving</a>
											<span class="d-block font-size-sm text-muted">Payment method: Payoneer</span>
										</h6>
									</td>
									<td>
										<select name="status" class="form-control form-control-select2" data-placeholder="Select status">
											<option value="overdue">Overdue</option>
											<option value="hold">On hold</option>
											<option value="pending">Pending</option>
											<option value="paid" selected>Paid</option>
											<option value="invalid">Invalid</option>
											<option value="cancel">Canceled</option>
										</select>
									</td>
									<td>
										May 9, 2015
									</td>
									<td>
										<span class="badge badge-success">Paid on Jan 28, 2015</span>
									</td>
									<td>
										<h6 class="mb-0 font-weight-bold">$2,600 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $370</span></h6>
									</td>
					<td class="text-center">
						<div class="list-icons list-icons-extended">
							<a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
									<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
									<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
								</div>
							</div>
						</div>
					</td>
							</tr>

				<tr>
					<td>#0010</td>
					<td>November 2014</td>
									<td>
										<h6 class="mb-0">
											<a href="#">James Basel</a>
											<span class="d-block font-size-sm text-muted">Payment method: Wire transfer</span>
										</h6>
									</td>
									<td>
										<select name="status" class="form-control form-control-select2" data-placeholder="Select status">
											<option value="overdue" selected>Overdue</option>
											<option value="hold">On hold</option>
											<option value="pending">Pending</option>
											<option value="paid">Paid</option>
											<option value="invalid">Invalid</option>
											<option value="cancel">Canceled</option>
										</select>
									</td>
									<td>
										June 1, 2015
									</td>
									<td>
										<span class="badge badge-warning">5 days</span>
									</td>
									<td>
										<h6 class="mb-0 font-weight-bold">$6,800 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $2,118</span></h6>
									</td>
					<td class="text-center">
						<div class="list-icons list-icons-extended">
							<a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
									<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
									<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
								</div>
							</div>
						</div>
					</td>
							</tr>

				<tr>
					<td>#0009</td>
					<td>November 2014</td>
									<td>
										<h6 class="mb-0">
											<a href="#">Lucy Johnson</a>
											<span class="d-block font-size-sm text-muted">Payment method: Paypal</span>
										</h6>
									</td>
									<td>
										<select name="status" class="form-control form-control-select2" data-placeholder="Select status">
											<option value="overdue">Overdue</option>
											<option value="hold">On hold</option>
											<option value="pending">Pending</option>
											<option value="paid" selected>Paid</option>
											<option value="invalid">Invalid</option>
											<option value="cancel">Canceled</option>
										</select>
									</td>
									<td>
										April 10, 2015
									</td>
									<td>
										<span class="badge badge-success">Paid on Jan 17, 2015</span>
									</td>
									<td>
										<h6 class="mb-0 font-weight-bold">$900 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $199</span></h6>
									</td>
					<td class="text-center">
						<div class="list-icons list-icons-extended">
							<a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
									<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
									<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
								</div>
							</div>
						</div>
					</td>
							</tr>

				<tr>
					<td>#0008</td>
					<td>October 2014</td>
									<td>
										<h6 class="mb-0">
											<a href="#">Kinga Wallace</a>
											<span class="d-block font-size-sm text-muted">Payment method: Skrill</span>
										</h6>
									</td>
									<td>
										<select name="status" class="form-control form-control-select2" data-placeholder="Select status">
											<option value="overdue">Overdue</option>
											<option value="hold">On hold</option>
											<option value="pending" selected>Pending</option>
											<option value="paid">Paid</option>
											<option value="invalid">Invalid</option>
											<option value="cancel">Canceled</option>
										</select>
									</td>
									<td>
										April 12, 2015
									</td>
									<td>
										<span class="badge badge-primary">12 days</span>
									</td>
									<td>
										<h6 class="mb-0 font-weight-bold">$1,200 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $298</span></h6>
									</td>
					<td class="text-center">
						<div class="list-icons list-icons-extended">
							<a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
									<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
									<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
								</div>
							</div>
						</div>
					</td>
							</tr>

				<tr>
					<td>#0007</td>
					<td>October 2014</td>
									<td>
										<h6 class="mb-0">
											<a href="#">Anna Zuniga</a>
											<span class="d-block font-size-sm text-muted">Payment method: Payoneer</span>
										</h6>
									</td>
									<td>
										<select name="status" class="form-control form-control-select2" data-placeholder="Select status">
											<option value="overdue">Overdue</option>
											<option value="hold">On hold</option>
											<option value="pending">Pending</option>
											<option value="paid" selected>Paid</option>
											<option value="invalid">Invalid</option>
											<option value="cancel">Canceled</option>
										</select>
									</td>
									<td>
										March 29, 2015
									</td>
									<td>
										<span class="badge badge-success">Paid on Jan 14, 2015</span>
									</td>
									<td>
										<h6 class="mb-0 font-weight-bold">$13,000 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $4,290</span></h6>
									</td>
					<td class="text-center">
						<div class="list-icons list-icons-extended">
							<a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
									<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
									<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
								</div>
							</div>
						</div>
					</td>
							</tr>

				<tr>
					<td>#0006</td>
					<td>October 2014</td>
									<td>
										<h6 class="mb-0">
											<a href="#">Nicolette Grey</a>
											<span class="d-block font-size-sm text-muted">Payment method: Paypal</span>
										</h6>
									</td>
									<td>
										<select name="status" class="form-control form-control-select2" data-placeholder="Select status">
											<option value="overdue">Overdue</option>
											<option value="hold">On hold</option>
											<option value="pending" selected>Pending</option>
											<option value="paid">Paid</option>
											<option value="invalid">Invalid</option>
											<option value="cancel">Canceled</option>
										</select>
									</td>
									<td>
										February 23, 2015
									</td>
									<td>
										<span class="badge badge-secondary">On hold</span>
									</td>
									<td>
										<h6 class="mb-0 font-weight-bold">$5,200 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $1,300</span></h6>
									</td>
					<td class="text-center">
						<div class="list-icons list-icons-extended">
							<a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
									<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
									<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
								</div>
							</div>
						</div>
					</td>
							</tr>

				<tr>
					<td>#0005</td>
					<td>October 2014</td>
									<td>
										<h6 class="mb-0">
											<a href="#">Vanessa Aurelius</a>
											<span class="d-block font-size-sm text-muted">Payment method: Wire transfer</span>
										</h6>
									</td>
									<td>
										<select name="status" class="form-control form-control-select2" data-placeholder="Select status">
											<option value="overdue">Overdue</option>
											<option value="hold">On hold</option>
											<option value="pending">Pending</option>
											<option value="paid" selected>Paid</option>
											<option value="invalid">Invalid</option>
											<option value="cancel">Canceled</option>
										</select>
									</td>
									<td>
										January 10, 2015
									</td>
									<td>
										<span class="badge badge-warning">9 days</span>
									</td>
									<td>
										<h6 class="mb-0 font-weight-bold">$3,000 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $789</span></h6>
									</td>
					<td class="text-center">
						<div class="list-icons list-icons-extended">
							<a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
									<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
									<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
								</div>
							</div>
						</div>
					</td>
							</tr>

				<tr>
					<td>#0004</td>
					<td>October 2014</td>
									<td>
										<h6 class="mb-0">
											<a href="#">Hanna Walden</a>
											<span class="d-block font-size-sm text-muted">Payment method: Paypal</span>
										</h6>
									</td>
									<td>
										<select name="status" class="form-control form-control-select2" data-placeholder="Select status">
											<option value="overdue">Overdue</option>
											<option value="hold">On hold</option>
											<option value="pending">Pending</option>
											<option value="paid" selected>Paid</option>
											<option value="invalid">Invalid</option>
											<option value="cancel">Canceled</option>
										</select>
									</td>
									<td>
										May 2, 2015
									</td>
									<td>
										<span class="badge badge-primary">20 days</span>
									</td>
									<td>
										<h6 class="mb-0 font-weight-bold">$2,830 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $600</span></h6>
									</td>
					<td class="text-center">
						<div class="list-icons list-icons-extended">
							<a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
									<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
									<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
								</div>
							</div>
						</div>
					</td>
							</tr>

				<tr>
					<td>#0003</td>
					<td>September 2014</td>
									<td>
										<h6 class="mb-0">
											<a href="#">Dori Laperriere</a>
											<span class="d-block font-size-sm text-muted">Payment method: Skrill</span>
										</h6>
									</td>
									<td>
										<select name="status" class="form-control form-control-select2" data-placeholder="Select status">
											<option value="overdue">Overdue</option>
											<option value="hold" selected>On hold</option>
											<option value="pending">Pending</option>
											<option value="paid">Paid</option>
											<option value="invalid">Invalid</option>
											<option value="cancel">Canceled</option>
										</select>
									</td>
									<td>
										May 1, 2015
									</td>
									<td>
										<span class="badge badge-success">Paid on Jan 10, 2015</span>
									</td>
									<td>
										<h6 class="mb-0 font-weight-bold">$12,850 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $3,590</span></h6>
									</td>
					<td class="text-center">
						<div class="list-icons list-icons-extended">
							<a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
									<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
									<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
								</div>
							</div>
						</div>
					</td>
							</tr>

				<tr>
					<td>#0002</td>
					<td>September 2014</td>
									<td>
										<h6 class="mb-0">
											<a href="#">Jordano Diressimo</a>
											<span class="d-block font-size-sm text-muted">Payment method: Paypal</span>
										</h6>
									</td>
									<td>
										<select name="status" class="form-control form-control-select2" data-placeholder="Select status">
											<option value="overdue">Overdue</option>
											<option value="hold">On hold</option>
											<option value="pending">Pending</option>
											<option value="paid" selected>Paid</option>
											<option value="invalid">Invalid</option>
											<option value="cancel">Canceled</option>
										</select>
									</td>
									<td>
										June 22, 2015
									</td>
									<td>
										<span class="badge badge-success">Paid on Jan 9, 2015</span>
									</td>
									<td>
										<h6 class="mb-0 font-weight-bold">$10,900 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $3,690</span></h6>
									</td>
					<td class="text-center">
						<div class="list-icons list-icons-extended">
							<a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
									<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
									<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
								</div>
							</div>
						</div>
					</td>
							</tr>

				<tr>
					<td>#0001</td>
					<td>September 2014</td>
									<td>
										<h6 class="mb-0">
											<a href="#">Patrick Muller</a>
											<span class="d-block font-size-sm text-muted">Payment method: Paypal</span>
										</h6>
									</td>
									<td>
										<select name="status" class="form-control form-control-select2" data-placeholder="Select status">
											<option value="overdue" selected>Overdue</option>
											<option value="hold">On hold</option>
											<option value="pending">Pending</option>
											<option value="paid">Paid</option>
											<option value="invalid">Invalid</option>
											<option value="cancel">Canceled</option>
										</select>
									</td>
									<td>
										April 4, 2015
									</td>
									<td>
										<span class="badge badge-warning">5 days</span>
									</td>
									<td>
										<h6 class="mb-0 font-weight-bold">$9,390 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $2,548</span></h6>
									</td>
					<td class="text-center">
						<div class="list-icons list-icons-extended">
							<a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
							<div class="list-icons-item dropdown">
								<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
									<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
									<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
								</div>
							</div>
						</div>
					</td>
							</tr>
						</tbody>
					</table>
	</div>
	<!-- /invoice archive -->

@endsection
