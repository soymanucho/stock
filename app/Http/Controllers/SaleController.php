<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sale;
use App\Client;

class SaleController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function show()
  {
    $sales = Sale::orderbydesc('id')->with('products')->with('client')->with('latestStatus')->get();
    return view('sale.show',compact('sales'));
  }

  public function new()
  {
    $sale = new Sale();
    $sale = new Sale();
    return view('sale.new',compact('sale'));
  }

  public function edit(Sale $sale)
  {

    return view('sale.edit',compact('sale'));
  }

  public function save(Request $request)
  {
    // dd($request);
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
    $sale = new Sale;
    $sale->fill($request->all());
    $sale->save();

    $address = new Address;
    $address->fill($request->all());
    $address->save();

    $sale->address()->associate($address)->save();

    return redirect()->route('sale-show');
  }

  public function update(Sale $sale, Request $request)
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

    $sale->fill($request->all());
    $sale->save();

    $address = $sale->address;
    $address->fill($request->all());
    $address->save();

    return redirect()->route('sale-show');
  }
  public function detail(Sale $sale)
  {
    return view('sale.detail',compact('sale'));
  }
}
