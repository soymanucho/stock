<fieldset class="mb-3">
  <legend class="text-uppercase font-size-sm font-weight-bold">Datos</legend>

  @isset($user->id)
    <div class="form-group row">
      <label class="col-form-label col-lg-2" for="id">Nro. de usuario</label>
      <div class="col-lg-10">
        <input type="text" class="form-control rounded-round" disabled="disabled" name="id" placeholder="Nro. de usuario" value="{{ old('id',$user->id)}}">
      </div>
    </div>
  @endisset
  <div class="form-group row">
    <label class="col-form-label col-lg-2" for="name">Nombre</label>
    <div class="col-lg-10">
      <input type="text" class="form-control rounded-round" name="name" placeholder="Nombre" value="{{ old('name',$user->name)}}">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-form-label col-lg-2" for="email">Email</label>
    <div class="col-lg-10">
      <input type="text" class="form-control rounded-round" name="email" placeholder="Email del usuario" value="{{ old('cuit',$user->email)}}">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-form-label col-lg-2" for="role_id">Rol</label>
    <div class="col-lg-10">
      <select id="role_id" class="form-control" name="role_id">
        @foreach ($roles as $rol)
          <option value="{{ old('role_id',$rol->id)}}"
          @isset($user->roles)
            @if ($user->roles->first()->id == $rol->id)
              selected="selected"
            @endif
          @endisset
          >{{$rol->name}}</option>
        @endforeach
      </select>
    </div>
  </div>

</fieldset>
