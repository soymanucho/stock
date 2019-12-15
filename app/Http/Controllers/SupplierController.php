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
          'name' => 'required|string|max:100',
          'street' => 'required|string|max:60',
          'number'=> 'required|string|max:10',
          'floor'=> 'nullable|string|max:10',
          'location_id'=> 'required|exists:locations,id',

      ],
      [

      ],
      [
        'name' => 'Nombre',
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
          'name' => 'required|string|max:100',
          'street' => 'required|string|max:60',
          'number'=> 'required|string|max:10',
          'floor'=> 'nullable|string|max:10',
          'location_id'=> 'required|exists:locations,id',

      ],
      [

      ],
      [
        'name' => 'Nombre',
        'street' => 'Calle',
        'number'=> 'Número',
        'floor'=> 'Piso',
        'location_id'=> 'Localidad',
      ]
    );

    $supplier->fill($request->all());
    $supplier->save();

    return redirect()->route('supplier-show');
  }
  public function detail(Supplier $supplier)
  {
    return view('supplier.detail',compact('supplier'));
  }
}
