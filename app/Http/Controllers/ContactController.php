<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;
use App\Client;

class ContactController extends Controller
{
  public function new(Client $client)
  {
    $client = Client::with('contacts')->where('id',$client->id)->first();
    $contact = new Contact();
    // $client->contacts->associate($contact)->save();
    return view('contact.new',compact('contact','client'));
  }
  public function delete(Client $client, Contact $contact)
  {
    $client = Client::with('contacts')->where('id',$client->id)->first();
    $contact = Contact::where('id',$contact->id)->first();
    $contact->delete();
    // $client->contacts->associate($contact)->save();
    return redirect()->route('client-edit',compact('client'));
  }
  public function edit(Client $client,Contact $contact)
  {
    $client = Client::with('contacts')->where('id',$client->id)->first();
    $contact = Contact::where('id',$contact->id)->first();
    // $client->contacts->associate($contact)->save();
    return view('contact.edit',compact('contact','client'));
  }
  public function save(Client $client,Request $request)
  {
    // dd($request);
    $this->validate(
      $request,
      [
          'name' => 'required|string|max:100',
          'position' => 'nullable|string|max:20',
          'email' => 'nullable|email|string|max:60',
          'prefix'=> 'nullable|numeric',
          'phone'=> 'nullable|numeric',

      ],
      [

      ],
      [
        'name' => 'Nombre',
        'cuit' => 'CUIT',
        'street' => 'Calle',
        'number'=> 'Número',
        'floor'=> 'Piso',
        'location_id'=> 'Localidad',
      ]
    );
    $client = Client::with('contacts')->where('id',$client->id)->first();
    $contact = new Contact;
    $contact->fill($request->all());
    $contact->contactable_id = $client->id;
    $contact->contactable_type = Client::class;
    $contact->save();
    // dd($contact,$client);

    // $contact->contactable()->associate($client);
    // $client->contacts->save($contact);


    return redirect()->route('client-edit',compact('client'));
  }
  public function update(Client $client,Contact $contact,Request $request)
  {
    // dd($request);
    $this->validate(
      $request,
      [
          'name' => 'required|string|max:100',
          'position' => 'nullable|string|max:20',
          'email' => 'nullable|email|string|max:60',
          'prefix'=> 'nullable|numeric',
          'phone'=> 'nullable|numeric',

      ],
      [

      ],
      [
        'name' => 'Nombre',
        'cuit' => 'CUIT',
        'street' => 'Calle',
        'number'=> 'Número',
        'floor'=> 'Piso',
        'location_id'=> 'Localidad',
      ]
    );
    $client = Client::with('contacts')->where('id',$client->id)->first();
    $contact = Contact::where('id',$contact->id)->first();
    $contact->fill($request->all());
    // $contact->contactable_id = $client->id;
    // $contact->contactable_type = Client::class;
    $contact->save();
    // dd($contact,$client);

    // $contact->contactable()->associate($client);
    // $client->contacts->save($contact);


    return redirect()->route('client-edit',compact('client'));
  }
}
