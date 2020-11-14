<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;

use App\ProductStatus;
use App\Product;
use App\ProductOrder;
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
    $user = Auth::user();
    $order = new Order();
    $order->user()->associate($user);
    $order->save();

    return redirect()->route('order-edit',compact('order'));
  }

  public function mailOrder(Order $order)
  {

    $order = Order::where('id',$order->id)->with('products.product')->with('products.status')->with('products')->with('supplier')->first();
    // dd($order->supplier->email);
    $productOrders = ProductOrder::where('sale_id',$sale->id)->with('product')->where('product_status_id', 2)->get();
    if ($productOrders->count() <= 0) {
      return Redirect::back()->withErrors(['Debe haber algún producto en estado "En stock" para poder generar un remito.']);
    }
    Mail::to($order->supplier->email)->send(new OrderShipped($order));

    $productStatus = ProductStatus::where('name','Pedido por mail')->first();
    foreach ($order->products as $productOrder) {
      if ($productOrder->status->name == 'Pedido'){
        $productOrder->status()->associate($productStatus);
        $productOrder->save();
      }
    }
    notify()->success('Mail enviado con éxito!','Intemun');
    return redirect()->route('order-edit',compact('order'));
  }
  public function receiveOrder(Order $order)
  {

    $order = Order::where('id',$order->id)->with('products.product')->with('products.status')->with('products')->first();
    $productStatus = ProductStatus::where('name','Recibido')->first();
    foreach ($order->products as $productOrder) {
      if ($productOrder->status->name == 'Pedido por mail' || $productOrder->status->name == 'Pedido' ){
        $productOrder->status()->associate($productStatus);
        $productOrder->save();
        $product = Product::where('id',$productOrder->product->id)->first();
        $product->stock = $product->stock + $productOrder->accepted_amount;
        $product->save();
      }
    }
    return redirect()->route('order-edit',compact('order'));
  }
  public function edit(Order $order)
  {
    $order = Order::where('id',$order->id)->with('products.product')->with('supplier')->with('supplier.address')->with('supplier.address.location')->with('supplier.address.location.province')->with('products.status')->with('products')->first();
    $productStatuses = ProductStatus::all();
    return view('order.edit',compact('order','productStatuses'));
  }
  public function delete(Order $order)
  {
    $order = Order::where('id',$order->id)->delete();

    return redirect()->route('order-show');
  }
  public function deleteProduct(Order $order, ProductOrder $productOrder)
  {
    $product = ProductOrder::where('id',$productOrder->id)->first();
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

    $productStatus = ProductStatus::where('name','Pedido')->first();

    $productOrder = new ProductOrder;
    $productOrder->product()->associate($product);
    $productOrder->order()->associate($order);
    $productOrder->status()->associate($productStatus);
    $productOrder->ordered_amount = $request->amount;
    $productOrder->accepted_amount = $request->amount;
    $productOrder->price = $request->price;
    $productOrder->save();
    return redirect()->back()->with('order');
  }

  public function update(Order $order, Request $request)
  {
    $this->validate(
      $request,
      [
          'supplier_id' => 'required|exists:suppliers,id',
          'created_at'=> 'required|date',

      ],
      [

      ],
      [
        'supplier_id' => 'Proveedor',
        'created_at'=> 'Fecha',

      ]
    );

    $order->fill($request->all());
    $order->save();

    return redirect()->route('order-show');
  }
  public function detail(Order $order)
  {
    return view('order.detail',compact('order'));
  }
}
