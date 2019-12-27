<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;



use App\Sale;
use App\Receipt;
use App\ProductSale;

class ReceiptController extends Controller
{
  public function show(Sale $sale)
  {
    $receipts = Receipt::where('sale_id',$sale->id)->with('productSales')->orderbydesc('created_at')->get();

    return view('receipt.show',compact('sale','receipts'));
  }
  public function print(Sale $sale, Receipt $receipt)
  {
    $receipt = Receipt::where('id',$receipt->id)->with('productSales')->with('sale')->with('sale.client')->with('sale.client.address')->with('sale.client.address.location')->with('sale.client.address.location.province')->first();

    return view('receipt.print',compact('sale','receipt'));
  }
  public function detail(Sale $sale, Receipt $receipt)
  {
    $receipt = Receipt::where('id',$receipt->id)->with('productSales')->with('sale')->with('sale.client')->with('sale.client.address')->with('sale.client.address.location')->with('sale.client.address.location.province')->first();

    return view('receipt.printFancyBox',compact('sale','receipt'));
  }
  public function new(Sale $sale)
  {
    $productSales = ProductSale::where('sale_id',$sale->id)->where('product_status_id', 3)->get();

    $receipt = new Receipt;

    $receipt->sale()->associate($sale);
    $receipt->save();

    foreach ($productSales as $productSale) {
      $productSale->receipt()->associate($receipt)->save();
    }

    // $receipt->productSales()->saveMany($productSales);
    // $receipt->save();

    $receipts = Receipt::where('sale_id',$sale->id)->with('productSales')->orderbydesc('created_at')->get();

    return redirect()->route('receipt-show',compact('sale'));
  }
}
