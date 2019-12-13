<div class="form-group row">
  <label class="col-form-label col-sm-3" for="name">Nombre</label>
  <div class="col-sm-9">
    <input type="text" placeholder="Juan" class="form-control" name="name" value="{{ old('name',$contact->name)}}">
  </div>
</div>
<div class="form-group row">
  <label class="col-form-label col-sm-3" for="position">Cargo en la empresa</label>
  <div class="col-sm-9">
    <input type="text" placeholder="Encargado de ventas" class="form-control" name="position" value="{{ old('position',$contact->position)}}">
  </div>
</div>

<div class="form-group row">
  <label class="col-form-label col-sm-3" for="email">Correo electrónico</label>
  <div class="col-sm-9">
    <input type="text" placeholder="hola@ejemplo.com" class="form-control" name="email" value="{{ old('email',$contact->email)}}">
    {{-- <span class="form-text text-muted">nombre@dominio.com</span> --}}
  </div>
</div>
<div class="form-group row">
  <label class="col-form-label col-sm-3" for="prefix">Prefijo</label>
  <div class="col-sm-9">
    <input type="text" placeholder="0221" class="form-control" name="prefix" value="{{ old('prefix',$contact->prefix)}}">
  </div>
</div>

<div class="form-group row">
  <label class="col-form-label col-sm-3" for="phone"># de teléfono</label>
  <div class="col-sm-9">
    <input type="text" placeholder="6378778" data-mask="+99-99-9999-9999" class="form-control" name="phone" value="{{ old('phone',$contact->phone)}}">
    {{-- <span class="form-text text-muted">+999-9999</span> --}}
  </div>
</div>
