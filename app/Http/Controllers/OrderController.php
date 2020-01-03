<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductStatus;
use App\Product;
use App\Supplier;
use App\Order;

class OrderController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function show()
  {
    $orders = Order::orderbydesc('id')->with('products')->with('supplier')->get();
    return view('order.show',compact('orders'));
  }

  public function new()
  {
    $order = new Order();
    $order->save();
    $order->statuses()->attach([$status->id]);
    // $status->orders()->attach([$order->id]);
    // $status->save();
    // $order->save();
    // $paymentTypes = PaymentType::all();
    // return view('order.new',compact('order','paymentTypes'));
    return redirect()->route('order-edit',compact('order'));
  }

  public function edit(Order $order)
  {
    // $products = ProductSale::where('sale_id',$order->id)->with('order')->with('order.latestStatus')->with('order.paymentType')->with('order.client')->with('order.client.address')->with('order.client.address.location')->with('order.client.address.location.province')->with('product')->with('status')->orderby('product_status_id')->get();
    // if (isset($products->first()->order)) {
    //   $order = $products->first()->order;
    // }else {
      $order = Order::where('id',$order->id)->with('latestStatus')->with('products.product')->with('paymentType')->with('client')->with('client.address')->with('client.address.location')->with('client.address.location.province')->with('products.status')->with('products')->first();
    // }

    $productStatuses = ProductStatus::all();
    $paymentTypes = PaymentType::all();
    return view('order.edit',compact('order','paymentTypes','productStatuses'));
  }
  public function deleteProduct(Order $order, ProductSale $productSale)
  {
    // $order = Order::where('id',$order->id)->with('products')->with('products.product')->with('products')->first();
    $product = ProductSale::where('id',$productSale->id)->first();
    $product->delete();
    return redirect()->back()->with('order');
  }
  public function newProduct(Request $request, Order $order)
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
    $productSale->order()->associate($order);
    $productSale->status()->associate($productStatus);
    $productSale->amount = $request->amount;
    $productSale->price = $request->price;
    $productSale->price = $request->price;
    $productSale->save();
    return redirect()->back()->with('order');
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
  //   $order = new Order;
  //   $order->fill($request->all());
  //   $order->save();
  //
  //   $order->address()->associate($address)->save();
  //
  //   return redirect()->route('order-show');
  // }

  public function update(Order $order, Request $request)
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
    // Presupuestado
    // Preparado
    // Remitido
    // Facturado
    // Cobrado


    // Cancelado
    // Pedido
    // En stock
    // Entregado
    $outOfStockProducts = ProductSale::where('sale_id',$order->id)->where('product_status_id',2)->get()->count();
    $inStockProducts = ProductSale::where('sale_id',$order->id)->where('product_status_id',3)->get()->count();
    $deliveredProducts = ProductSale::where('sale_id',$order->id)->where('product_status_id',4)->get()->count();
    $saleProductsCount = $order->products()->where('product_status_id','<>',1)->get()->count();
    if ($outOfStockProducts > 0) {
      if ($order->latestStatus()->first()->name <> 'Presupuestado') {
        $status = Status::where('id',1)->first();
        $order->statuses()->attach([$status->id]);
      }
    }elseif ($inStockProducts > 0 && $inStockProducts = $saleProductsCount) {
      $status = Status::where('id',2)->first();
      $order->statuses()->attach([$status->id]);
    }elseif ($deliveredProducts > 0 && $deliveredProducts = $saleProductsCount) {
      $status = Status::where('id',3)->first();
      $order->statuses()->attach([$status->id]);
    }

    $order->fill($request->all());
    $order->save();

    return redirect()->route('order-show');
  }
  public function detail(Order $order)
  {
    return view('order.detail',compact('order'));
  }
}
