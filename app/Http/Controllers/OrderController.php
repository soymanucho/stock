<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    $order = Order::where('id',$order->id)->with('products.product')->with('supplier')->with('supplier.address')->with('supplier.address.location')->with('supplier.address.location.province')->with('products.status')->with('products')->first();
    // }
    $productStatuses = ProductStatus::all();

    return view('order.edit',compact('order','productStatuses'));
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
    // switch ($stock) {
    //   case true:
          // $productStatus = ProductStatus::where('name','En stock')->first();
      //   break;
      //
      // default:
          $productStatus = ProductStatus::where('name','Pedido')->first();
    //     break;
    // }
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
    // Presupuestado
    // Preparado
    // Remitido
    // Facturado
    // Cobrado


    // Cancelado
    // Pedido
    // En stock
    // Entregado
    // $outOfStockProducts = ProductOrder::where('order_id',$order->id)->where('product_status_id',2)->get()->count();
    // $inStockProducts = ProductOrder::where('order_id',$order->id)->where('product_status_id',3)->get()->count();
    // $deliveredProducts = ProductOrder::where('order_id',$order->id)->where('product_status_id',4)->get()->count();
    // $saleProductsCount = $order->products()->where('product_status_id','<>',1)->get()->count();

    $order->fill($request->all());
    $order->save();

    return redirect()->route('order-show');
  }
  public function detail(Order $order)
  {
    return view('order.detail',compact('order'));
  }
}
