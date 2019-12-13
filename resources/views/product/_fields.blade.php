<fieldset class="mb-3">
  <legend class="text-uppercase font-size-sm font-weight-bold">Datos</legend>

  <div class="form-group row">
    <label class="col-form-label col-lg-2" for="code">Código</label>
    <div class="col-lg-10">
      <input type="text" class="form-control rounded-round" name="code" placeholder="Código del producto" value="{{ old('code',$product->code)}}">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-form-label col-lg-2" for="name">Nombre</label>
    <div class="col-lg-10">
      <input type="text" class="form-control rounded-round" name="name" placeholder="Nombre del producto" value="{{ old('name',$product->name)}}">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-form-label col-lg-2" for="description">Descripción</label>
    <div class="col-lg-10">
      <input type="text" class="form-control rounded-round" name="description" placeholder="Descripción del producto" value="{{ old('description',$product->description)}}">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-form-label col-lg-2" for="stock">Stock</label>
    <div class="col-lg-10">
      <input type="text" class="form-control rounded-round" name="stock" placeholder="Stock del producto" value="{{ old('stock',$product->stock)}}">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-form-label col-lg-2" for="location_id">Marca</label>
    <div class="col-lg-10">
      <select id="brands" class="form-control" name="brand_id">
        @foreach ($brands as $brand)
          <option value="{{ old('brand_id',$brand->id)}}"
          @isset($product->brand->id)
            @if ($brand->id == $product->brand->id)
              selected="selected"
            @endif
          @endisset
          >{{$brand->name}}</option>
        @endforeach
      </select>
    </div>
  </div>
</fieldset>
