
<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title">Nuevo contacto del cliente {{$client->name}}</h5>
	</div>

	<form action="{!! route('contact-update',compact('client','contact')) !!}" class="form-horizontal" method="post">
		{{ csrf_field() }}
		{{ method_field('put') }}
		<div class="modal-body">

			@include('contact._fields')

		</div>

		<div class="modal-footer">
			<button type="button" class="btn btn-link" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn bg-primary">Editar contacto</button>
		</div>
	</form>
</div>
