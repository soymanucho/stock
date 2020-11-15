<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;
use App\Address;
use App\PaymentDay;

class ClientController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function show()
  {
    $clients = Client::orderby('name')->with('address')->with('sales')->with('paymentDay')->with('lastSale')->with('address.location')->with('address.location.province')->get();
    return view('client.show',compact('clients'));
  }

  public function new()
  {
    $client = new Client();
    $paymentDays = PaymentDay::all();
    return view('client.new',compact('client','paymentDays'));
  }

  public function edit(Client $client)
  {
    $paymentDays = PaymentDay::all();
    return view('client.edit',compact('client','paymentDays'));
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
          'cp'=> 'nullable|string|max:15',
          'location_id'=> 'required|exists:locations,id',
          'payment_day_id'=> 'required|exists:payment_days,id',

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
        'payment_day_id'=> 'Condición de pago',
      ]
    );
    $client = new Client;
    $client->fill($request->all());
    $client->save();

    $address = new Address;
    $address->fill($request->all());
    $address->save();

    $client->address()->save($address);
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
          'cp'=> 'nullable|string|max:15',
          'location_id'=> 'required|exists:locations,id',
          'payment_day_id'=> 'required|exists:payment_days,id',

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
        'payment_day_id'=> 'Condición de pago',
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
    $paymentDays = PaymentDay::all();
    return view('client.detail',compact('client','paymentDays'));
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
          ->orWhere('id','like','%' .$search . '%')
          ->limit(5)->get();
    }
    $response = array();
    foreach($clients as $client){
       $response[] = array(
            "id"=>$client->id,
            "text"=>'#'.$client->id.' - '.$client->name.' ('.$client->cuit.')',
            "name"=>$client->name,
            "cuit"=>$client->cuit,
            "paymentDay"=>$client->paymentDay->name,
            "address"=>$client->fullAddress()
       );
    }

    return json_encode($response);
  }
}
