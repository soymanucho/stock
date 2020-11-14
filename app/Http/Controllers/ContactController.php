<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;
use App\Client;

class ContactController extends Controller
{
  public function new($model,$id)
  {
    $modelClass = $model;
    $model = $modelClass::with('contacts')->where('id',$id)->first();
    $contact = new Contact();
    // $client->contacts->associate($contact)->save();
    return view('contact.new',compact('contact','model'));
  }
  public function delete($model,$id, Contact $contact)
  {
    $modelClass = $model;
    $model = $modelClass::with('contacts')->where('id',$id)->first();
    $contact = Contact::where('id',$contact->id)->first();
    $contact->delete();
    // $client->contacts->associate($contact)->save();
    if ($modelClass == 'App\Client') {
      $client = $model;
      return redirect()->route('client-edit',compact('client'));
    } elseif ($modelClass == 'App\Supplier') {
      $supplier = $model;
      return redirect()->route('supplier-edit',compact('supplier'));
    }

  }
  public function edit($model,$id,Contact $contact)
  {
    $modelClass = $model;
    $model = $modelClass::with('contacts')->where('id',$id)->first();
    $contact = Contact::where('id',$contact->id)->first();
    // $client->contacts->associate($contact)->save();
    return view('contact.edit',compact('contact','model'));
  }
  public function save($model,$id,Request $request)
  {
    // dd($request);
    $this->validate(
      $request,
      [
          'name' => 'required|string|max:100',
          'position' => 'nullable|string|max:20',
          'schedule' => 'nullable|string|max:50',
          'email' => 'nullable|email|string|max:60',
          'prefix'=> 'nullable|numeric',
          'phone'=> 'nullable|numeric',

      ],
      [

      ],
      [
        'name' => 'Nombre',
        'position' => 'Posición',
        'schedule' => 'Horarios',
        'email' => 'Correo electrónico',
        'prefix'=> 'Prefijo',
        'phone'=> 'Teléfono',
      ]
    );
    $modelClass = $model;
    $model = $modelClass::with('contacts')->where('id',$id)->first();
    $contact = new Contact;
    $contact->fill($request->all());
    $contact->contactable_id = $model->id;
    $contact->contactable_type = $modelClass;
    $contact->save();
    // dd($contact,$client);

    // $contact->contactable()->associate($client);
    // $client->contacts->save($contact);


    if ($modelClass == 'App\Client') {
      $client = $model;
      return redirect()->route('client-edit',compact('client'));
    } elseif ($modelClass == 'App\Supplier') {
      $supplier = $model;
      return redirect()->route('supplier-edit',compact('supplier'));
    }

  }
  public function update($model,$id,Contact $contact,Request $request)
  {
    // dd($request);
    $this->validate(
      $request,
      [
          'name' => 'required|string|max:100',
          'position' => 'nullable|string|max:20',
          'schedule' => 'nullable|string|max:50',
          'email' => 'nullable|email|string|max:60',
          'prefix'=> 'nullable|numeric',
          'phone'=> 'nullable|numeric',

      ],
      [

      ],
      [
        'name' => 'Nombre',
        'position' => 'Posición',
        'schedule' => 'Horarios',
        'email' => 'Correo electrónico',
        'prefix'=> 'Prefijo',
        'phone'=> 'Teléfono',
      ]
    );
    $modelClass = $model;
    $model = $modelClass::with('contacts')->where('id',$id)->first();
    $contact = Contact::where('id',$contact->id)->first();
    $contact->fill($request->all());
    // $contact->contactable_id = $client->id;
    // $contact->contactable_type = Client::class;
    $contact->save();
    // dd($contact,$client);

    // $contact->contactable()->associate($client);
    // $client->contacts->save($contact);


    if ($modelClass == 'App\Client') {
      $client = $model;
      return redirect()->route('client-edit',compact('client'));
    } elseif ($modelClass == 'App\Supplier') {
      $supplier = $model;
      return redirect()->route('supplier-edit',compact('supplier'));
    }

  }
}
