<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Barryvdh\DomPDF\Facade as PDF;

use App\CaeVoucher;

use App\Sale;
use App\Receipt;
use App\ProductSale;
use App\ProductStatus;

class ReceiptController extends Controller
{
  public function show(Sale $sale)
  {
    $receipts = Receipt::where('sale_id',$sale->id)->with('productSales')->with('sale')->with('sale.paymentType')->with('productSales.status')->orderbydesc('created_at')->get();

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
    $productSales = ProductSale::where('sale_id',$sale->id)->with('product')->where('product_status_id', 4)->get();
    if ($productSales->count() <= 0) {
      return Redirect::back()->withErrors(['Debe haber algún producto en estado "En stock" para poder generar un remito.']);
    }elseif ($sale->client == null) {
      return Redirect::back()->withErrors(['Debe asignar un cliente y guardar la venta para poder generar un remito.']);
    }
    // $lastCae = CaeVoucher::where('')
    // if
    $receipt = new Receipt;

    $receipt->sale()->associate($sale);
    $receipt->save();

    $statusEntregado = ProductStatus::where('name','Entregado')->first();

    foreach ($productSales as $productSale) {
      $productSale->receipt()->associate($receipt)->save();
      $productSale->product->stock = $productSale->product->stock - $productSale->amount;
      $productSale->product->save();
      $productSale->status()->associate($statusEntregado)->save();
    }
    // $receipt->productSales()->saveMany($productSales);
    // $receipt->save();

    $receipts = Receipt::where('sale_id',$sale->id)->with('productSales')->orderbydesc('created_at')->get();

    return redirect()->route('receipt-show',compact('sale'));
  }
}
