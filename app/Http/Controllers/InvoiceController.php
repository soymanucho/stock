<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Redirect;

use App\CaeVoucher;
use App\Sale;
use App\Invoice;
use App\Receipt;
use App\ProductSale;
use App\ProductStatus;

class InvoiceController extends Controller
{
  public function show(Sale $sale)
  {
    $invoices = Invoice::where('sale_id',$sale->id)->with('productSales')->with('sale')->with('sale.paymentType')->with('productSales.status')->orderbydesc('created_at')->get();

    return view('invoice.show',compact('sale','invoices'));
  }
  public function print(Sale $sale, Invoice $invoice)
  {
    $invoice = Invoice::where('id',$invoice->id)->with('productSales')->with('sale')->with('sale.client')->with('sale.client.address')->with('sale.client.address.location')->with('sale.client.address.location.province')->first();

    return view('invoice.print',compact('sale','invoice'));
  }
  public function detail(Sale $sale, Invoice $invoice)
  {
    $invoice = Invoice::where('id',$invoice->id)->with('productSales')->with('sale')->with('sale.client')->with('sale.client.address')->with('sale.client.address.location')->with('sale.client.address.location.province')->first();
    return view('invoice.printFancyBox',compact('sale','invoice'));
  }
  public function new(Sale $sale,Request $request)
  {
    $this->validate(
      $request,
      [
          'prefix_number' => 'required|string|max:4',
          'number' => 'required|string|max:8|unique:invoices,number',
          'emissions_date' => 'required|date',
          'expiration_date'=> 'required|date|after_or_equal:emissions_date',
      ],
      [

      ],
      [
        'prefix_number' => 'Punto de venta',
        'number' => 'Número de factura',
        'emissions_date' => 'Fecha de emisión',
        'expiration_date'=> 'Fecha de vencimiento',
      ]
    );
    $productSales = ProductSale::where('sale_id',$sale->id)->with('product')->where('product_status_id', 4)->get();
    $lastCae = CaeVoucher::where('ini_date','<=',Carbon::now())->where('fin_date','>=',Carbon::now())->latest('fin_date')->first();
    if ($productSales->count() <= 0) {
      return Redirect::back()->withErrors(['Debe haber algún producto en estado "Entregado" para poder generar una factura.']);
    }
    if (!isset($lastCae)){
      return Redirect::back()->withErrors(['No hay ningún Cae vigente. Revise el mismo para poder factura.']);
    }
    $invoice = new Invoice;
    $invoice->sale()->associate($sale);
    $invoice->caeVoucher()->associate($lastCae);
    $invoice->fill($request->all());
    $invoice->save();

    $statusFacturado = ProductStatus::where('name','Facturado')->first();

    foreach ($productSales as $productSale) {
      $productSale->invoice()->associate($invoice)->save();
      $productSale->product->save();
      $productSale->status()->associate($statusFacturado)->save();
    }
    // $invoice->productSales()->saveMany($productSales);
    // $invoice->save();

    $invoices = Invoice::where('sale_id',$sale->id)->with('productSales')->orderbydesc('created_at')->get();

    return redirect()->route('invoice-show',compact('sale'));
  }
}
