<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;

class ClientController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function show()
  {
    $clients = Client::orderby('name')->with('address')->with('address.location')->with('address.location.province')->get();
    return view('client.show',compact('clients'));
  }

  public function new()
  {
    $client = new Client();
    $genders = Gender::all();
    return view('client.newClient',compact('client','genders'));
  }

  public function edit(Client $client)
  {
    $genders = Gender::all();
    return view('client.editClient',compact('client','genders'));
  }

  public function save(Request $request)
  {
    $this->validate(
      $request,
      [
          'firstname' => 'required|max:60',
          'lastname' => 'required|max:60',
          'phone' => 'nullable|max:60',
          'address'=> 'max:60',
          'email'=> 'nullable|max:60',
          'dni'=> 'required|max:60 ',
          'birthdate'=> 'nullable|date',
          'gender_id'=>'required|exists:genders,id',

      ],
      [

      ],
      [
          'firstname' => 'nombre',
          'lastname' => 'apellido',
          'phone' => 'teléfono',
          'address' => 'dirección',
          'birthdate' => 'fecha de nacimiento',
          'email' => 'email',
          'gender_id' => 'genero',
          'dni' => 'D.N.I',
      ]
    );
    $client = new Client;
    $client->fill($request->all());
    $client->save();

    return redirect()->route('client-show');
  }

  public function update(Client $client, Request $request)
  {
    $this->validate(
      $request,
      [
          'firstname' => 'required|max:60',
          'lastname' => 'required|max:60',
          'phone' => 'nullable|max:60',
          'address'=> 'required|max:60',
          'email'=> 'nullable|max:60',
          'dni'=> 'required|max:60 ',
          'birthdate'=> 'nullable|date',
          'gender_id'=>'required|exists:genders,id',

      ],
      [

      ],
      [
          'firstname' => 'nombre',
          'lastname' => 'apellido',
          'phone' => 'teléfono',
          'address' => 'dirección',
          'birthdate' => 'fecha de nacimiento',
          'email' => 'email',
          'gender_id' => 'genero',
          'dni' => 'D.N.I',
      ]
    );

    $client->fill($request->all());
    $client->save();

    return redirect()->route('client-show');
  }
  public function detail(Client $client)
  {
    return view('clients.detail',compact('client'));
  }
}
