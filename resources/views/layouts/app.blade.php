<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>{{ config('app.name', 'Intemun') }}</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<link href="{{ asset('/css/icomoonstyles.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/css/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/css/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('/css/colors.min.css') }}" rel="stylesheet" type="text/css">
	<!-- Bootstrap Date-Picker Plugin -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-
	datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-
	datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
	<!-- /global stylesheets -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.4/jquery-jvectormap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css" />
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	{{-- <script src="{{ asset('/js/jquery.min.js') }}" defer></script> --}}
	<!-- Core JS files -->
	<script src="{{ asset('/js/bootstrap.bundle.min.js') }}" defer></script>
	<script src="{{ asset('/js/blockui.min.js') }}" defer></script>

	<script src="{{ asset('/js/pdfmake.min.js') }}" defer></script>
	<script src="{{ asset('/js/jszip.min.js') }}" defer></script>
	<script src="{{ asset('/js/responsive.min.js') }}" defer></script>
	<script src="{{ asset('/js/vfs_fonts.min.js') }}" defer></script>
	<script src="{{ asset('/js/buttons.min.js') }}" defer></script>
	<script src="{{ asset('/js/ckeditor.js') }}" defer></script>
	<script src="{{ asset('/js/echarts.min.js') }}" defer></script>
	<script src="{{ asset('/js/ecommerce_orders_history.js') }}" defer></script>
	<script src="{{ asset('/js/invoice_archive.js') }}" defer></script>
	<script src="{{ asset('/js/invoice_template.js') }}" defer></script>

	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ asset('/js/app.js') }}" defer></script>
	<!-- /theme JS files -->

	<!-- Extra files -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
	<!-- /Extra files -->
</head>

<body class="sidebar-xs">

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark">
		<div class="navbar-brand">
			<a href="{!! route('home') !!}" class="d-inline-block">
				<img src="{{ asset('/img/logo.png') }}" alt="">
			</a>
		</div>


		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-arrow-down52"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
			@if (Route::currentRouteName() != 'home')
				<button class="navbar-toggler sidebar-mobile-secondary-toggle" type="button">
					<i class="icon-more"></i>
				</button>
			@endif
			<button class="navbar-toggler sidebar-mobile-component-toggle" type="button">
				<i class="icon-unfold"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
				@if (Route::currentRouteName() != 'home')
					<li class="nav-item">
						<a href="#" class="navbar-nav-link sidebar-control sidebar-secondary-toggle d-none d-md-block">
							<i class="icon-list-unordered"></i>
						</a>
					</li>
				@endif
			</ul>

			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a href="{!! route('home') !!}" class="navbar-nav-link">
						Inicio
					</a>
				</li>

				{{-- <li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
						<i class="icon-bell2"></i>
						<span class="d-md-none ml-2">Notificaciones</span>
						<span class="badge badge-pill bg-warning-400 ml-auto ml-md-0">2</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
						<div class="dropdown-content-header">
							<span class="font-weight-semibold">Notificaciones</span>
						</div>

						<div class="dropdown-content-body dropdown-scrollable">
							<ul class="media-list" id="notificationContainer">

							</ul>
						</div>

						<div class="dropdown-content-footer justify-content-center p-0">
							<a href="#" class="bg-light text-grey w-100 py-2" data-popup="tooltip" title="" data-original-title="Load more"><i class="icon-menu7 d-block top-0"></i></a>
						</div>
					</div>
				</li> --}}

				@guest
					<li class="nav-item">
						<a href="{{ route('login') }}" class="navbar-nav-link">
							Iniciar sesión
						</a>
					</li>
					@if (Route::has('requestInvitation'))
						<li class="nav-item">
							<a href="{{ route('requestInvitation') }}" class="navbar-nav-link">
								Registrarme
							</a>
						</li>
					@endif
				@else

					<li class="nav-item dropdown dropdown-user">
						<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
							<img src="{{ asset('/favicon-96x96.png') }}" class="rounded-circle" alt="">
							<span>{{ Auth::user()->name }}</span>
						</a>

						<div class="dropdown-menu dropdown-menu-right">
							{{-- <a href="#" class="dropdown-item"><i class="icon-user-plus"></i> Mi perfil</a> --}}
							{{-- <a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a> --}}
							{{-- <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span class="badge badge-pill bg-blue ml-auto">58</span></a> --}}
							<div class="dropdown-divider"></div>
							{{-- <a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a> --}}
							<a class="dropdown-item" href="{{ route('logout') }}"
								 onclick="event.preventDefault();
															 document.getElementById('logout-form').submit();">
									<i class="icon-switch2"></i>{{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
							</form>
						</div>
					</li>

				@endguest
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navegación
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user">
					<div class="card-body">
						<div class="media">
							<div class="mr-3">
								<a href="#"><img src="{{ asset('/favicon-96x96.png') }}" width="38" height="38" class="rounded-circle" alt=""></a>
							</div>

							<div class="media-body">
								<div class="media-title font-weight-semibold">
									@auth
										{{Auth::user()->name}}
									@endauth
								</div>
								<div class="font-size-xs opacity-50">
									<i class="icon-mail5 font-size-sm"></i> &nbsp;
									@auth
										{{Auth::user()->email}}
									@endauth
								</div>
							</div>

							<div class="ml-3 align-self-center">
								{{-- <a href="#" class="text-white"><i class="icon-cog3"></i></a> --}}
							</div>
						</div>
					</div>
				</div>
				<!-- /user menu -->

				@include('layouts.main-sidebar')

			</div>
			<!-- /sidebar content -->

		</div>
		<!-- /main sidebar -->


		@yield('secondary-sidebar')


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><span class="font-weight-semibold">Intemun</span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						@yield('actions')
						{{-- <a href="#" class="btn btn-danger ml-2">Button <b><i class="icon-menu7"></i></b></a> --}}
						{{-- <a href="#" class="btn btn-warning ml-2">Button <b><i class="icon-menu7"></i></b></a> --}}
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					@yield('breadcrumbs')
				</div>
			</div>
			<!-- /page header -->

			<!-- Content area -->
			<div class="content">
				@include('layouts.flash-message')
				@yield('content')
			</div>
			<!-- /content area -->

			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Footer
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; 2019 - {{ now()->year }}. <a href="#">Intemun</a>
					</span>

					<ul class="navbar-nav ml-lg-auto">


						<li class="nav-item">
							<a href="https://wa.me/5492216373889?text=Buenas,%20reporte%20de%20error%20en%20IntemunApp" class="navbar-nav-link"> Reportar error <i class="icon-iphone"></i>
							</a>
						</li>

					</ul>
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jvectormap/1.2.2/jquery-jvectormap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.2/jquery.fancybox.min.js"></script>

<script type="text/javascript">

	$(document).ready( function () {

		$('#myTable').DataTable( {
					// "scrollX": true,
					"select": true,
					"responsive": true,
					 "order": [],
					 "language": {
							"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
					},
					"fnDrawCallback": function () {
						$(".fancybox").fancybox({
							maxWidth	: 1600,
				      minWidth	: 1000,
				  		maxHeight	: 300,
				  		fitToView	: true,
				  		width		: '100%',
				  		height		: '50%',
				  		autoSize	: true,
				  		closeClick	: false,
				  		openEffect	: 'none',
				  		closeEffect	: 'none',
				      type: 'ajax',
						});
					}
			} );

			$(".fancybox").fancybox({
	  		maxWidth	: 1600,
	      minWidth	: 1000,
	  		maxHeight	: 300,
	  		fitToView	: true,
	  		width		: '100%',
	  		height		: '50%',
	  		autoSize	: true,
	  		closeClick	: false,
	  		openEffect	: 'none',
	  		closeEffect	: 'none',
	      type: 'ajax',
				afterClose : function() {
	        window.location.reload();
	    	}
	  	});

			$('#flash-overlay-modal').modal();

	} );
</script>
</body>
</html>
