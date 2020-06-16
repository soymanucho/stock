<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Barryvdh\Debugbar\Facade as Debugbar;
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
    $sales = Sale::orderbydesc('id')->with('products')->with('client')->with('paymentType')->with('latestStatus')->get();
    return view('sale.show',compact('sales'));
  }

  public function new()
  {
    $status = Status::where('id',1)->first();
    $user = Auth::user();
    $sale = new Sale();
    $sale->fee = 1;
    $sale->user()->associate($user);
    $sale->save();
    $sale->statuses()->attach([$status->id]);
    return redirect()->route('sale-edit',compact('sale'));
  }

  public function delete(Sale $sale)
  {
    $sale = Sale::where('id',$sale->id)->delete();
    return redirect()->route('sale-show');
  }

  public function edit(Sale $sale)
  {
    $sale = Sale::where('id',$sale->id)->with('statuses')->with('latestStatus')->with('products.product')->with('paymentType')->with('client')->with('client.address')->with('client.address.location')->with('client.address.location.province')->with('products.status')->with('products')->first();
    $productStatuses = ProductStatus::all();
    $paymentTypes = PaymentType::all();
    return view('sale.edit',compact('sale','paymentTypes','productStatuses'));
  }

  public function deleteProduct(Sale $sale, ProductSale $productSale)
  {
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
          $productStatus = ProductStatus::where('name','Pedido')->first();
        break;
    }
    $productSale = new ProductSale;
    $productSale->product()->associate($product);
    $productSale->sale()->associate($sale);
    $productSale->status()->associate($productStatus);
    $productSale->amount = $request->amount;
    $productSale->price = $request->price;
    $productSale->save();
    return redirect()->back()->with('sale');
  }

  // public function save(Request $request)
  // {
  //   // dd($request);
  //   $this->validate(
  //     $request,
  //     [
  //         'name' => 'required|string|max:100',
  //         'cuit' => 'required|string|max:20',
  //         'street' => 'required|string|max:60',
  //         'number'=> 'required|string|max:10',
  //         'floor'=> 'nullable|string|max:10',
  //         'location_id'=> 'required|exists:locations,id',
  //
  //     ],
  //     [
  //
  //     ],
  //     [
  //       'name' => 'Nombre',
  //       'cuit' => 'CUIT',
  //       'street' => 'Calle',
  //       'number'=> 'Número',
  //       'floor'=> 'Piso',
  //       'location_id'=> 'Localidad',
  //     ]
  //   );
  //   $sale = new Sale;
  //   $sale->fill($request->all());
  //   $sale->save();
  //
  //   $sale->address()->associate($address)->save();
  //
  //   return redirect()->route('sale-show');
  // }

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
    $outOfStockProducts = ProductSale::where('sale_id',$sale->id)->where('product_status_id',2)->get()->count();
    $inStockProducts = ProductSale::where('sale_id',$sale->id)->where('product_status_id',3)->get()->count();
    $deliveredProducts = ProductSale::where('sale_id',$sale->id)->where('product_status_id',4)->get()->count();
    $saleProductsCount = $sale->products()->where('product_status_id','<>',1)->get()->count();
    if ($outOfStockProducts > 0) {
      if ($sale->latestStatus()->first()->id <> 1) {
        $status = Status::where('id',1)->first();
        $sale->statuses()->attach([$status->id]);
      }
    }elseif ($inStockProducts > 0 && $inStockProducts = $saleProductsCount && $sale->latestStatus()->first()->id <> 2) {
      $status = Status::where('id',2)->first();
      $sale->statuses()->attach([$status->id]);
    }elseif ($deliveredProducts > 0 && $deliveredProducts = $saleProductsCount && $sale->latestStatus()->first()->id <> 3) {
      $status = Status::where('id',3)->first();
      $sale->statuses()->attach([$status->id]);
    }

    $sale->fill($request->all());
    $sale->save();

    return redirect()->route('sale-show');
  }

  public function detail(Sale $sale)
  {
    return view('sale.detail',compact('sale'));
  }
}
