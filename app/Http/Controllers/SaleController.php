<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sale;
use App\Status;
use App\Client;
use App\PaymentType;
use App\ProductSale;
use App\ProductStatus;
use App\Product;

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
    $status = Status::where('name','Presupuestada')->first();
    $sale = new Sale();
    $sale->fee = 1;
    $sale->save();
    $sale->statuses()->attach([$status->id]);
    // $status->sales()->attach([$sale->id]);
    // $status->save();
    // $sale->save();
    // $paymentTypes = PaymentType::all();
    // return view('sale.new',compact('sale','paymentTypes'));
    return redirect()->route('sale-edit',compact('sale'));
  }

  public function edit(Sale $sale)
  {
    $products = ProductSale::where('sale_id',$sale->id)->with('sale')->with('sale.latestStatus')->with('sale.paymentType')->with('sale.client')->with('sale.client.address')->with('sale.client.address.location')->with('sale.client.address.location.province')->with('product')->with('status')->orderby('product_status_id')->get();
    if (isset($products->first()->sale)) {
      $sale = $products->first()->sale;
    }else {
      $sale = Sale::where('id',$sale->id)->with('latestStatus')->with('products.product')->with('products')->first();
    }

    $paymentTypes = PaymentType::all();
    return view('sale.edit',compact('sale','paymentTypes','products'));
  }
  public function deleteProduct(Sale $sale, ProductSale $productSale)
  {
    // $sale = Sale::where('id',$sale->id)->with('products')->with('products.product')->with('products')->first();
    $product = ProductSale::where('id',$productSale->id)->first();
    $product->delete();
    return redirect()->back()->with('sale');
  }
  public function newProduct(Request $request, Sale $sale)
  {
    $this->validate(
      $request,
      [
          'product_id' => 'required|exists:products,id',
          'amount' => 'required|numeric',
          'price' => 'required|numeric',
      ],
      [

      ],
      [
        'product_id' => 'Producto',
        'amount' => 'Cantidad',
        'price' => 'Precio',

      ]
    );
    $product = Product::where('id',$request->product_id)->first();
    $stock = $product->stock > 0;
    switch ($stock) {
      case true:
          $productStatus = ProductStatus::where('name','En stock')->first();
        break;

      default:
          $productStatus = ProductStatus::where('name','Sin stock')->first();
        break;
    }
    $productSale = new ProductSale;
    $productSale->product()->associate($product);
    $productSale->sale()->associate($sale);
    $productSale->status()->associate($productStatus);
    $productSale->amount = $request->amount;
    $productSale->price = $request->price;
    $productSale->price = $request->price;
    $productSale->save();
    return redirect()->back()->with('sale');
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

    $sale->address()->associate($address)->save();

    return redirect()->route('sale-show');
  }

  public function update(Sale $sale, Request $request)
  {
    $this->validate(
      $request,
      [
          'client_id' => 'required|exists:clients,id',
          'payment_type_id' => 'required|exists:payment_types,id',
          'fee' => 'required|numeric',
          'created_at'=> 'required|date',

      ],
      [

      ],
      [
        'client_id' => 'Cliente',
        'payment_type_id' => 'Forma de pago',
        'fee' => 'Cuotas',
        'created_at'=> 'Fecha',

      ]
    );

    $sale->fill($request->all());
    $sale->save();

    return redirect()->route('sale-show');
  }
  public function detail(Sale $sale)
  {
    return view('sale.detail',compact('sale'));
  }
}
