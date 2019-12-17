<fieldset class="mb-3">
  <legend class="text-uppercase font-size-sm font-weight-bold">Datos</legend>
  <div class="form-group row">
    <label class="col-form-label col-lg-2" for="client_id">Cliente</label>
    <div class="col-lg-10">
      <select id="clients" class="form-control" name="client_id">
        @isset($sale->client)
          <option value="{{ old('client_id',$sale->client->id)}}" selected="selected">{{$sale->client->name}}, {{$sale->client->cuit}} </option>
        @else
          <option value="0" selected="selected">-- Seleccionar cliente --</option>
        @endisset
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-form-label col-lg-2" for="products[]">Productos</label>
    <div class="col-lg-10">
      <select id="products" class="form-control" name="products[]" multiple="multiple">
        {{-- @isset($products)
          <option value="{{ old('products[]',$client->address->location->id)}}" selected="selected">{{$client->address->location->name}}, {{$client->address->location->province->name}} </option>
        @else
          <option value="0" selected="selected">-- Seleccionar productos --</option>
        @endisset --}}
      </select>
    </div>
  </div>
</fieldset>
