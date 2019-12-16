<fieldset class="mb-3">
  <legend class="text-uppercase font-size-sm font-weight-bold">Datos</legend>

  <div class="form-group row">
    <label class="col-form-label col-lg-2" for="name">Nombre</label>
    <div class="col-lg-10">
      <input type="text" class="form-control rounded-round" name="name" placeholder="Nombre de la marca" value="{{ old('name',$brand->name)}}">
    </div>
  </div>

</fieldset>
