
<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title">Nuevo contacto del cliente {{$client->name}}</h5>
	</div>

	<form action="{!! route('contact-save',compact('client')) !!}" class="form-horizontal" method="post">
		{{ csrf_field() }}
		{{ method_field('post') }}
		<div class="modal-body">

			<div class="form-group row">
				<label class="col-form-label col-sm-3" for="name">Nombre</label>
				<div class="col-sm-9">
					<input type="text" placeholder="Juan" class="form-control" name="name">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-form-label col-sm-3" for="position">Cargo en la empresa</label>
				<div class="col-sm-9">
					<input type="text" placeholder="Encargado de ventas" class="form-control" name="position">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-form-label col-sm-3" for="email">Correo electrónico</label>
				<div class="col-sm-9">
					<input type="text" placeholder="hola@ejemplo.com" class="form-control" name="email">
					{{-- <span class="form-text text-muted">nombre@dominio.com</span> --}}
				</div>
			</div>
			<div class="form-group row">
				<label class="col-form-label col-sm-3" for="prefix">Prefijo</label>
				<div class="col-sm-9">
					<input type="text" placeholder="0221" class="form-control" name="prefix">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-form-label col-sm-3" for="phone"># de teléfono</label>
				<div class="col-sm-9">
					<input type="text" placeholder="6378778" data-mask="+99-99-9999-9999" class="form-control" name="phone">
					{{-- <span class="form-text text-muted">+999-9999</span> --}}
				</div>
			</div>

		</div>

		<div class="modal-footer">
			<button type="button" class="btn btn-link" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn bg-primary">Crear contacto</button>
		</div>
	</form>
</div>
