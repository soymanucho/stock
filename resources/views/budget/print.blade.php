<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <title>Factura</title>
  </head>
  <body>

    <!-- Invoice template -->
    <div class="card">
  		<div class="card-header bg-transparent header-elements-inline">
  			<h6 class="card-title">Venta #{{$sale->id}}</h6>
  			<div class="header-elements">
  				{{-- <button type="button" class="btn btn-light btn-sm"><i class="icon-file-check mr-2"></i> Save</button>
  				<button type="button" class="btn btn-light btn-sm ml-3"><i class="icon-printer mr-2"></i> Print</button> --}}
  			</div>
  		</div>

  		<div class="card-body">
  			<div class="row">
  				<div class="col-sm-6">
  					<div class="mb-4">
  						<img src="{{ asset('/img/logo3.png') }}" class="mb-3 mt-2 bg-slate" alt="" style="width: 120px;">
  						<ul class="list list-unstyled mb-0">
  							<li>14 nº 2213</li>
  							<li>La Plata, Argentina</li>
  							<li>+54 9 221-588-5867</li>
  						</ul>
  					</div>
  				</div>

  				<div class="col-sm-6">
  					<div class="mb-4">
  						<div class="text-sm-right">
  							<h4 class="text-primary mb-2 mt-md-2">Factura #{{$budget->id}}</h4>
  							<ul class="list list-unstyled mb-0">
  								<li>Fecha: <span class="font-weight-semibold">{{$budget->created_at->format('M d, y')}}</span></li>
  								<li>Fecha de vencimiento: <span class="font-weight-semibold">{{$budget->created_at->addMonths(1)->format('M d, y')}}</span></li>
  							</ul>
  						</div>
  					</div>
  				</div>
  			</div>

  			<div class="d-md-flex flex-md-wrap">
  				<div class="mb-4 mb-md-2">
  					<span class="text-muted">Factura para:</span>
  					<ul class="list list-unstyled mb-0">
  						<li><h5 class="my-2">{{$sale->client->name ?? ''}}</h5></li>
  						<li><span class="font-weight-semibold">{{$sale->client->cuit ?? ''}}</span></li>
  						<li>Calle {{$sale->client->address->street ?? ''}} n°{{$sale->client->address->number ?? ''}}, piso{{$sale->client->address->floor ?? ''}}</li>
  						<li>{{$sale->client->address->location->name ?? ''}}</li>
  						<li>{{$sale->client->address->location->province->name ?? ''}}</li>
  						{{-- <li>888-555-2311</li> --}}
  						{{-- <li><a href="#">rebecca@normandaxis.ltd</a></li> --}}
  					</ul>
  				</div>

  				<div class="mb-2 ml-auto">
  					<span class="text-muted">Detalles de la factura:</span>
  					<div class="d-flex flex-wrap wmin-md-400">
  						<ul class="list list-unstyled mb-0">
  							<li><h5 class="my-2">Monto total:</h5></li>
  							{{-- <li>Bank name:</li> --}}
  							<li>Pais:</li>
  							<li>Ciudad:</li>
  							<li>Dirección:</li>
  							<li>CUIT:</li>
  							<li>Remito nº:</li>
  						</ul>

  						<ul class="list list-unstyled text-right mb-0 ml-auto">
  							<li><h5 class="font-weight-semibold my-2">${{$budget->totalAmount()}}</h5></li>
  							{{-- <li><span class="font-weight-semibold">Profit Bank Europe</span></li> --}}
  							<li>Argentina</li>
  							<li>{{$sale->client->address->location->name ?? ''}}</li>
  							<li>Calle {{$sale->client->address->street ?? ''}} n°{{$sale->client->address->number ?? ''}}, piso{{$sale->client->address->floor ?? ''}}</li>
  							<li><span class="font-weight-semibold">{{$sale->client->cuit ?? ''}}</span></li>
  							<li><span class="font-weight-semibold">{{$budget->id}}</span></li>
  						</ul>
  					</div>
  				</div>
  			</div>
  		</div>

  		<div class="table-responsive">
  				<table class="table table-lg">
  						<thead>
  								<tr>
  										<th>Descripción</th>
  										<th>Precio unitario</th>
  										<th>Cantidad</th>
  										<th>Subtotal</th>
  								</tr>
  						</thead>
  						<tbody>
  							@foreach ($budget->productSales as $productSale)
  								<tr>
  										<td>
  											<h6 class="mb-0">{{$productSale->product->name}}</h6>
  											<span class="text-muted">{{$productSale->product->description}}</span>
  										</td>
  										<td>${{number_format($productSale->price,2,',','.')}}</td>
  										<td>{{$productSale->amount}}</td>
  										<td><span class="font-weight-semibold">${{number_format($productSale->amount*$productSale->price,2,',','.')}}</span></td>
  								</tr>
  							@endforeach
  						</tbody>
  				</table>
  		</div>

  		<div class="card-body">
  			<div class="d-md-flex flex-md-wrap">


  				<div class="pt-2 mb-3 wmin-md-400 ml-auto">
  					<h6 class="mb-3">Total</h6>
  					<div class="table-responsive">
  						<table class="table">
  							<tbody>
  								<tr>
  									<th>Subtotal:</th>
  									<td class="text-right">${{number_format($budget->subtotal(),2,',','.')}}</td>
  								</tr>
  								<tr>
  									<th>IVA: <span class="font-weight-normal">(21%)</span></th>
  									<td class="text-right">${{number_format($budget->totalIVA(),2,',','.')}}</td>
  								</tr>
  								<tr>
  									<th>Total:</th>
  									<td class="text-right text-primary"><h5 class="font-weight-semibold">${{number_format($budget->totalAmount(),2,',','.')}}</h5></td>
  								</tr>
  							</tbody>
  						</table>
  					</div>

  					<div class="text-right mt-3">
  						{{-- <button type="button" class="btn btn-primary btn-labeled btn-labeled-left"><b><i class="icon-paperplane"></i></b> Send budget</button> --}}
  					</div>
  				</div>
  			</div>
  		</div>

  		<div class="card-footer">
  			<span class="text-muted">Ante cualquier duda comuncarse al +54 9 221-588-5867</span>
  		</div>
  	</div>
  	<!-- /budget template -->
<script type="text/javascript">
	window.print()
</script>
	</body>
</html>
