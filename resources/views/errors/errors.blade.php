@if ($errors->all())
  <div class="alert alert-warning alert-dismissible">
		<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
    @foreach($errors->all() as $error)
      <span class="font-weight-semibold">{{ config('app.name', 'Intemun') }} dice:</span> {{ $error }}
      <br>
    @endforeach
  </div>
@endif
