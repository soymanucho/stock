<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;
use App\Address;

class ClientController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function show()
  {
    $clients = Client::orderby('name')->with('address')->with('sales')->with('lastSale')->with('address.location')->with('address.location.province')->get();
    return view('client.show',compact('clients'));
  }

  public function new()
  {
    $client = new Client();
    return view('client.new',compact('client'));
  }

  public function edit(Client $client)
  {

    return view('client.edit',compact('client'));
  }

  public function save(Request $request)
  {
    // dd($request);
    $this->validate(
      $request,
      [
          'name' => 'required|string|max:100',
          'cuit' => array(
            'required',
            'regex:/\b(20|23|24|27|30|33|34)(\D)?[0-9]{0,8}(\D)?[0-9]/u'
          ),
          'street' => 'required|string|max:60',
          'number'=> 'required|string|max:10',
          'floor'=> 'nullable|string|max:10',
          'location_id'=> 'required|exists:locations,id',

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
    $client = new Client;
    $client->fill($request->all());
    $client->save();

    $address = new Address;
    $address->fill($request->all());
    $address->save();

    $client->address()->associate($address)->save();
    notify()->success('Cliente creado con éxito!','Intemun');
    return redirect()->route('client-show');
  }

  public function update(Client $client, Request $request)
  {
    $this->validate(
      $request,
      [
          'name' => 'required|string|max:100',
          'cuit' => 'required|string|max:20',
          'street' => 'required|string|max:60',
          'number'=> 'required|string|max:10',
          'floor'=> 'nullable|string|max:10',
          'location_id'=> 'required|exists:locations,id',

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

    $client->fill($request->all());
    $client->save();

    $address = $client->address;
    $address->fill($request->all());
    $address->save();
    notify()->warning('Cliente editado con éxito!','Intemun');
    return redirect()->route('client-show');
  }
  public function detail(Client $client)
  {
    return view('client.detail',compact('client'));
  }

  public function selectApi(Request $request)
  {
    $search = $request->search;

    if($search == ''){
       $clients = Client::orderby('name','asc')->limit(5)->with('address')->with('address.location')->with('address.location.province')->get();
    }else{
       $clients = Client::orderby('name','asc')
          ->where('name', 'like', '%' .$search . '%')
          ->orWhere('cuil','like','%' .$search . '%')
          ->limit(5)->get();
    }
    $response = array();
    foreach($clients as $client){
       $response[] = array(
            "id"=>$client->id,
            "text"=>$client->name.' ('.$client->cuit.')',
            "name"=>$client->name,
            "cuit"=>$client->cuit,
            "address"=>$client->fullAddress()
       );
    }

    return json_encode($response);
  }
}
