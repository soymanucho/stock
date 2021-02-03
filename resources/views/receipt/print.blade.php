<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <title>Remito</title>
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
                <li>14 nº 2213 Entre 509 y 510bis</li>
                <li>La Plata, Argentina</li>
                <li>+54 9 221-588-5867</li>
                <li>ventas@intemun.com.ar</li>
              </ul>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="mb-4">
              <div class="text-sm-right">
                <h4 class="text-primary mb-2 mt-md-2">Remito #{{$receipt->id}}</h4>
                <ul class="list list-unstyled mb-0">
                  <li>Fecha de emisión: <span class="font-weight-semibold">{{$receipt->created_at->format('M d, y')}}</span></li>
                  <li>Fecha de vencimiento: <span class="font-weight-semibold">{{$receipt->created_at->addMonths(1)->format('M d, y')}}</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="d-md-flex flex-md-wrap">

          <div class="mb-2 ml-auto">
            <span class="text-muted">Detalles del remito:</span>
            <div class="d-flex flex-wrap wmin-md-400">
              <ul class="list list-unstyled mb-0">
                <li>Cliente:</li>
                <li>Dirección:</li>
                <li>Localidad:</li>
                <li>CUIT:</li>
              </ul>

              <ul class="list list-unstyled text-right mb-0 ml-auto">
                <li>{{$sale->client->name ?? ''}}</li>
                <li>Calle {{$sale->client->address->street ?? ''}} n°{{$sale->client->address->number ?? ''}}, piso{{$sale->client->address->floor ?? ''}}</li>
                <li>{{$sale->client->address->location->name ?? ''}}, {{$sale->client->address->location->province->name ?? ''}}</li>
                <li><span class="font-weight-semibold">{{$sale->client->cuit ?? ''}}</span></li>
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

                      <th>Cantidad</th>

                  </tr>
              </thead>
              <tbody>
                @foreach ($receipt->productSales as $productSale)
                  <tr>
                      <td>
                        <h6 class="mb-0">{{$productSale->product->name}}</h6>
                        <span class="text-muted">{{$productSale->product->description}}</span>
                      </td>

                      <td>{{$productSale->amount}}</td>

                  </tr>
                @endforeach
              </tbody>
          </table>
      </div>

      <div class="card-footer">
        <span class="text-muted">Ante cualquier duda comuncarse al +54 9 221-588-5867</span>
      </div>
    </div>
  	<!-- /invoice template -->
<script type="text/javascript">
	window.print()
</script>
	</body>
</html>
