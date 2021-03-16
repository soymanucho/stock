@extends('layouts.datatable')

@section('header')

    <th># usuario</th>
    <th>Nombre</th>
    <th>Email</th>
    <th>Rol</th>
    <th>Editar rol</th>



@endsection

@section('body')
  @foreach($users as $user)
      <tr>
        <td>  {{ $user->id }} </td>
        <td>  {{ $user->name }} </td>
        <td>  {{ $user->email }} </td>
        <td>  {{ $user->getRoleNames()->first() }} </td>
        <td class="text-center">  <a href={!! route('user-edit',compact('user')) !!} ><i class="fas fa-edit"></i></a> </td>
      </tr>
    @endforeach
@endsection
