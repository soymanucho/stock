
<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title">Nuevo contacto del cliente {{$model->name}}</h5>
	</div>

	<form action="{!! route('contact-save',['model'=>$model->getMorphClass(),'id'=>$model]) !!}" class="form-horizontal" method="post">
		{{ csrf_field() }}
		{{ method_field('post') }}
		<div class="modal-body">

			@include('contact._fields')

		</div>

		<div class="modal-footer">
			{{-- <button type="button" class="btn btn-link" data-dismiss="modal">Cerrar</button> --}}
			<button type="submit" class="btn bg-primary">Crear contacto</button>
		</div>
	</form>
</div>
