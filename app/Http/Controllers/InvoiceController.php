<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Redirect;

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
          'invoice_iva_condition'=> 'nullable|integer',
      ],
      [

      ],
      [
        'prefix_number' => 'Punto de venta',
        'number' => 'Número de factura',
        'emissions_date' => 'Fecha de emisión',
        'expiration_date'=> 'Fecha de vencimiento',
        'invoice_iva_condition'=> 'Incluye IVA',
      ]
    );

    $productSales = ProductSale::where('sale_id',$sale->id)->with('product')->where('product_status_id', 5)->get();
    if ($productSales->count() <= 0) {
      return Redirect::back()->withErrors(['Debe haber algún producto en estado "Entregado" para poder generar una factura.']);
    }

    $invoice = new Invoice;
    $invoice->sale()->associate($sale);
    $request->merge(['expiration_date'=>Carbon::parse($request->input('expiration_date')),'emissions_date'=>Carbon::parse($request->input('emissions_date')),]);
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
