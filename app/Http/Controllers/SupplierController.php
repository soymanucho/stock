<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Supplier;
use App\Address;

class SupplierController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function show()
  {
    $suppliers = Supplier::orderby('name')->with('address')->with('address.location')->with('address.location.province')->get();
    return view('supplier.show',compact('suppliers'));
  }

  public function new()
  {
    $supplier = new Supplier();
    return view('supplier.new',compact('supplier'));
  }

  public function edit(Supplier $supplier)
  {

    return view('supplier.edit',compact('supplier'));
  }

  public function save(Request $request)
  {
    // dd($request);
    $this->validate(
      $request,
      [
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255',
          'street' => 'required|string|max:255',
          'number'=> 'required|numeric',
          'floor'=> 'nullable|string|max:255',
          'location_id'=> 'required|exists:locations,id',

      ],
      [

      ],
      [
        'name' => 'Nombre',
        'email' => 'Correo electrónico',
        'street' => 'Calle',
        'number'=> 'Número',
        'floor'=> 'Piso',
        'location_id'=> 'Localidad',
      ]
    );
    $supplier = new Supplier;
    $supplier->fill($request->all());
    $supplier->save();

    $address = new Address;
    $address->fill($request->all());
    $address->save();

    $supplier->address()->associate($address)->save();

    return redirect()->route('supplier-show');
  }

  public function update(Supplier $supplier, Request $request)
  {
    $this->validate(
      $request,
      [
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255',
          'street' => 'required|string|max:255',
          'number'=> 'required|numeric',
          'floor'=> 'nullable|string|max:255',
          'location_id'=> 'required|exists:locations,id',

      ],
      [

      ],
      [
        'name' => 'Nombre',
        'email' => 'Correo electrónico',
        'street' => 'Calle',
        'number'=> 'Número',
        'floor'=> 'Piso',
        'location_id'=> 'Localidad',
      ]
    );

    $supplier->fill($request->all());
    $supplier->save();

    $address = $supplier->address;
    $address->fill($request->all());
    $address->save();

    return redirect()->route('supplier-show');
  }
  public function detail(Supplier $supplier)
  {
    $supplier = Supplier::where('id',$supplier->id)->with('orders')->with('orders.products')->get()->first();
    return view('supplier.detail',compact('supplier'));
  }
  public function selectApi(Request $request)
  {
    $search = $request->search;

    if($search == ''){
       $suppliers = Supplier::orderby('name','asc')->limit(5)->with('address')->with('address.location')->with('address.location.province')->get();
    }else{
       $suppliers = Supplier::orderby('name','asc')
          ->where('name', 'like', '%' .$search . '%')
          ->limit(5)->get();
    }
    $response = array();
    foreach($suppliers as $supplier){
       $response[] = array(
            "id"=>$supplier->id,
            "text"=>$supplier->name,
            "name"=>$supplier->name,
            "email"=>$supplier->email,
            "address"=>$supplier->fullAddress()
       );
    }

    return json_encode($response);
  }
}
