@component('mail::message')

# Hola, quería pedirte:


Alguien te invitó a la plataforma de Intemun.

<a href="{{ route('accept', $invite->token) }}">Hace click acá</a> para activar tu cuenta!


Gracias,<br>
{!! config('app.name') !!}
{{-- Footer --}}
@slot('footer')
  @component('mail::footer')
      &copy; {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.
  @endcomponent
@endslot
@endcomponent
