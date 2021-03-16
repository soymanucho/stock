@extends('layouts.datatable')

@section('header')

    <th>Email</th>
    <th>Creado</th>
    <th>Link de invitación</th>
@endsection

@section('body')
  @foreach($invitations as $i=>$invitation)
      <tr>
        <td>  <a href="mailto:{{ $invitation->email }}">{{ $invitation->email }}</a> </td>
        <td> {{ $invitation->created_at }} </td>
        @php
          $link = $invitation->getLink()
        @endphp
        <td><kbd>{{ $link }}</kbd>  <button class="btn" onclick="myFunction('{{$link}}')"> <i class="fas fa-clipboard-list"></i> Copiar </button></td>
      </tr>
    @endforeach
@endsection
<script type="text/javascript">
  function myFunction(link) {
    var temp = link;
    var dummy = $('<input>').val(link).appendTo('body').select()
    document.execCommand('copy');
    $(dummy).remove();
  }
</script>
