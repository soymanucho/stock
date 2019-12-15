<fieldset class="mb-3">
  <legend class="text-uppercase font-size-sm font-weight-bold">Datos</legend>

  <div class="form-group row">
    <label class="col-form-label col-lg-2" for="name">Nombre</label>
    <div class="col-lg-10">
      <input type="text" class="form-control rounded-round" name="name" placeholder="Nombre del proveedor" value="{{ old('name',$supplier->name)}}">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-form-label col-lg-2" for="street">Calle</label>
    <div class="col-lg-10">
      <input type="text" class="form-control rounded-round" name="street" placeholder="Calle de la dirección"
        @isset($supplier->address)
          value="{{ old('street',$supplier->address->street)}}"
        @else
          value="{{ old('street','')}}"
        @endisset >
    </div>
  </div>
  <div class="form-group row">
    <label class="col-form-label col-lg-2" for="number">Número</label>
    <div class="col-lg-10">
      <input type="text" class="form-control rounded-round" name="number" placeholder="Número de la dirección"
      @isset($supplier->address)
        value="{{ old('number',$supplier->address->number)}}"
      @else
        value="{{ old('number','')}}"
      @endisset >
    </div>
  </div>
  <div class="form-group row">
    <label class="col-form-label col-lg-2" for="floor">Piso</label>
    <div class="col-lg-10">
      <input type="text" class="form-control rounded-round" name="floor" placeholder="Piso de la dirección"
      @isset($supplier->address)
        value="{{ old('floor',$supplier->address->floor)}}"
      @else
        value="{{ old('floor','')}}"
      @endisset >
    </div>
  </div>
  <div class="form-group row">
    <label class="col-form-label col-lg-2" for="location_id">Localidad</label>
    <div class="col-lg-10">
      <select id="locations" class="form-control" name="location_id">
        @isset($supplier->address->location)
          <option value="{{ old('location_id',$supplier->address->location->id)}}" selected="selected">{{$supplier->address->location->name}}, {{$supplier->address->location->province->name}} </option>
        @else
          <option value="0" selected="selected">-- Seleccionar localidad --</option>
        @endisset
      </select>
    </div>
  </div>
</fieldset>
@isset($supplier->id)

  <fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold">Contactos</legend>
    <div class="row">
      @isset($supplier->contacts)
        @foreach ($supplier->contacts as $contact)
          <div class="col-xl-3 col-md-6">
            <div class="card card-body">
              <div class="media">
                <div class="mr-3">
                  <a href="#">
                    <img src="{!! asset('/img/avatar.svg') !!}" class="rounded" width="38" height="38" alt="">
                  </a>
                </div>

                <div class="media-body">
                  <div class="font-weight-semibold">{{$contact->name}}</div>
                  <span class="text-muted">{{$contact->position}}</span>
                </div>

                <div class="ml-3 align-self-center">
                  <div class="list-icons">
                    <div class="dropdown">
                      <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                      <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-164px, 19px, 0px);">
                        <a href="tel:{{$contact->prefix}}{{$contact->phone}}" class="dropdown-item"><i class="icon-phone2"></i> Llamar al {{$contact->prefix}} {{$contact->phone}}</a>
                        <a href="mailto:{{$contact->email}}" class="dropdown-item"><i class="icon-mail5"></i> Enviar mail a {{$contact->email}}</a>
                        <div class="dropdown-divider"></div>
                        <a href="{!! route('contact-edit',['model'=>$supplier->getMorphClass(),'id'=>$supplier,'contact'=>$contact]) !!}" class="dropdown-item fancybox"><i class="fas fa-edit"></i> Editar</a>
                        <a href="{!! route('contact-delete',['model'=>$supplier->getMorphClass(),'id'=>$supplier,'contact'=>$contact]) !!}" class="dropdown-item"><i class="fas fa-trash-alt"></i> Eliminar</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      @endisset
      <div class="col-xl-3 col-md-6">
        <a href="{!! route('contact-new',['model'=>$supplier->getMorphClass(),'id'=>$supplier]) !!}" class="fancybox">
        <div class="card card-body">
          <div class="media">
            <div class="mr-3">
                <img src="{!! asset('/img/plus.svg') !!}" class="rounded" width="38" height="38" alt="">
            </div>

            <div class="media-body  my-auto">
              <div class="font-weight-semibold">Agregar nuevo contacto</div>
              {{-- <span class="text-muted mt-3">Agregar nuevo contacto</span> --}}
            </div>

          </div>
        </div>
        </a>
      </div>

    </div>
  </fieldset>
@endisset
