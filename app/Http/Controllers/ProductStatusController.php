<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductSale;
use App\ProductStatus;
use App\Sale;
use App\ProductOrder;
use App\Order;
use App\Product;

class ProductStatusController extends Controller
{
  public function editSale(Sale $sale, ProductSale $productSale, ProductStatus $productStatus)
  {
    $productSale = ProductSale::where('id',$productSale->id)->first();
    $productStatus = ProductStatus::where('id',$productStatus->id)->first();
    $productSale->status()->associate($productStatus)->save();

    return redirect()->back()->with('sale');
  }
  public function editOrder(Order $order, ProductOrder $productOrder, ProductStatus $productStatus)
  {
    $productOrder = ProductOrder::where('id',$productOrder->id)->first();
    $productStatus = ProductStatus::where('id',$productStatus->id)->first();

    $productOrder->status()->associate($productStatus)->save();

    return redirect()->back()->with('order');
  }
}
