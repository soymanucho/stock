<fieldset class="mb-3">
  <legend class="text-uppercase font-size-sm font-weight-bold">Datos</legend>

  @isset($client->id)
    <div class="form-group row">
      <label class="col-form-label col-lg-2" for="id">Nro. de cliente</label>
      <div class="col-lg-10">
        <input type="text" class="form-control rounded-round" disabled="disabled" name="id" placeholder="Nro. de cliente" value="{{ old('id',$client->id)}}">
      </div>
    </div>
  @endisset
  <div class="form-group row">
    <label class="col-form-label col-lg-2" for="name">Institución</label>
    <div class="col-lg-10">
      <input type="text" class="form-control rounded-round" name="name" placeholder="Institución" value="{{ old('name',$client->name)}}">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-form-label col-lg-2" for="cuit">CUIT</label>
    <div class="col-lg-10">
      <input type="text" class="form-control rounded-round" name="cuit" placeholder="CUIT del cliente" value="{{ old('cuit',$client->cuit)}}">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-form-label col-lg-2" for="payment_day_id">Condición de pago</label>
    <div class="col-lg-10">
      <select id="paymentDays" class="form-control" name="payment_day_id">
        @foreach ($paymentDays as $paymentDay)
          <option value="{{ old('payment_day_id',$paymentDay->id)}}"
          @isset($client->paymentDay)
            @if ($client->paymentDay->id == $paymentDay->id)
              selected="selected"
            @endif
          @endisset
          >{{$paymentDay->name}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-form-label col-lg-2" for="street">Calle</label>
    <div class="col-lg-10">
      <input type="text" class="form-control rounded-round" name="street" placeholder="Calle de la dirección"
        @isset($client->address)
          value="{{ old('street',$client->address->street)}}"
        @else
          value="{{ old('street','')}}"
        @endisset >
    </div>
  </div>
  <div class="form-group row">
    <label class="col-form-label col-lg-2" for="number">Número</label>
    <div class="col-lg-10">
      <input type="text" class="form-control rounded-round" name="number" placeholder="Número de la dirección"
      @isset($client->address)
        value="{{ old('number',$client->address->number)}}"
      @else
        value="{{ old('number','')}}"
      @endisset >
    </div>
  </div>
  <div class="form-group row">
    <label class="col-form-label col-lg-2" for="floor">Piso</label>
    <div class="col-lg-10">
      <input type="text" class="form-control rounded-round" name="floor" placeholder="Piso de la dirección"
      @isset($client->address)
        value="{{ old('floor',$client->address->floor)}}"
      @else
        value="{{ old('floor','')}}"
      @endisset >
    </div>
  </div>
  <div class="form-group row">
    <label class="col-form-label col-lg-2" for="cp">Código Postal</label>
    <div class="col-lg-10">
      <input type="text" class="form-control rounded-round" name="cp" placeholder="Código Postal"
      @isset($client->address)
        value="{{ old('cp',$client->address->cp)}}"
      @else
        value="{{ old('cp','')}}"
      @endisset >
    </div>
  </div>
  <div class="form-group row">
    <label class="col-form-label col-lg-2" for="location_id">Localidad</label>
    <div class="col-lg-10">
      <select id="locations" class="form-control" name="location_id">
        @isset($client->address->location)
          <option value="{{ old('location_id',$client->address->location->id)}}" selected="selected">{{$client->address->location->name}}, {{$client->address->location->province->name}} </option>
        @else
          <option value="0" selected="selected">-- Seleccionar localidad --</option>
        @endisset
      </select>
    </div>
  </div>
</fieldset>
@isset($client->id)

  <fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold">Contactos</legend>
    <div class="row">
      @isset($client->contacts)
        @foreach ($client->contacts as $contact)
          <div class="col-xl-6 col-md-6 col-sm-12">
            <div class="card card-body">
              <div class="media">
                <div class="mr-3">
                  <a href="#">
                    <img src="{!! asset('/img/avatar.svg') !!}" class="rounded" width="38" height="38" alt="">
                  </a>
                </div>

                <div class="media-body">
                  <div class="font-weight-semibold">{{$contact->name}}</div>
                  <span class="text-muted">{{$contact->position}}</span><br>
                  <span class="text-muted">Horario: {{$contact->schedule}}</span>
                </div>

                <div class="ml-3 align-self-center">
                  <div class="list-icons">
                    <div class="dropdown">
                      <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                      <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-164px, 19px, 0px);">
                        <a href="tel:{{$contact->prefix}}{{$contact->phone}}" class="dropdown-item"><i class="icon-phone2"></i> Llamar al {{$contact->prefix}} {{$contact->phone}}</a>
                        <a href="mailto:{{$contact->email}}" class="dropdown-item"><i class="icon-mail5"></i> Enviar mail a {{$contact->email}}</a>
                        <div class="dropdown-divider"></div>
                        <a href="{!! route('contact-edit',['model'=>$client->getMorphClass(),'id'=>$client,'contact'=>$contact]) !!}" class="dropdown-item fancybox"><i class="fas fa-edit"></i> Editar</a>
                        <a href="{!! route('contact-delete',['model'=>$client->getMorphClass(),'id'=>$client,'contact'=>$contact]) !!}" class="dropdown-item"><i class="fas fa-trash-alt"></i> Eliminar</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      @endisset
      <div class="col-xl-6 col-md-6 col-sm-12" id="newContact">
        <a href="{!! route('contact-new', ['model'=>$client->getMorphClass(),'id'=>$client]) !!}" class="fancybox">
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
