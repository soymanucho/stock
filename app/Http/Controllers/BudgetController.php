<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Redirect;

use App\Sale;
use App\Budget;
use App\Receipt;
use App\ProductSale;
use App\ProductStatus;

class BudgetController extends Controller
{

    public function show(Sale $sale)
    {
      $budgets = Budget::where('sale_id',$sale->id)->with('productSales')->with('sale')->with('sale.paymentType')->with('sale.client')->with('productSales.status')->orderbydesc('created_at')->get();

      return view('budget.show',compact('sale','budgets'));
    }
    public function print(Sale $sale, Budget $budget)
    {
      $budget = Budget::where('id',$budget->id)->with('productSales')->with('sale')->with('sale.client')->with('sale.client.address')->with('sale.client.address.location')->with('sale.client.address.location.province')->first();

      return view('budget.print',compact('sale','budget'));
    }
    public function detail(Sale $sale, Budget $budget)
    {
      $budget = Budget::where('id',$budget->id)->with('productSales')->with('sale')->with('sale.client')->with('sale.client.address')->with('sale.client.address.location')->with('sale.client.address.location.province')->first();
      return view('budget.printFancyBox',compact('sale','budget'));
    }
    public function new(Sale $sale,Request $request)
    {
      $this->validate(
        $request,
        [
            'emissions_date' => 'required|date',
            'expiration_date'=> 'required|date|after_or_equal:emissions_date',
            'budget_iva_condition'=> 'nullable|integer',
        ],
        [

        ],
        [
          'emissions_date' => 'Fecha de emisión',
          'expiration_date'=> 'Fecha de vencimiento',
          'budget_iva_condition'=> 'Incluye IVA',
        ]
      );
      
      if ($sale->client == null) {
        return Redirect::back()->withErrors(['Debe asignar un cliente y guardar la venta para poder generar un presupuesto.']);
      }
      $productSales = ProductSale::where('sale_id',$sale->id)->with('product')->where('product_status_id', 4)->get();
      // if ($productSales->count() <= 0) {
      //   return Redirect::back()->withErrors(['Debe haber algún producto en estado "Entregado" para poder generar una factura.']);
      // }

      $budget = new Budget;
      $budget->sale()->associate($sale);
      $request->merge(['expiration_date'=>Carbon::parse($request->input('expiration_date')),'emissions_date'=>Carbon::parse($request->input('emissions_date')),]);
      $budget->fill($request->all());
      $budget->save();

      $statusFacturado = ProductStatus::where('name','En stock')->first();

      foreach ($productSales as $productSale) {
        $productSale->budget()->associate($budget)->save();
        $productSale->product->save();
        $productSale->status()->associate($statusFacturado)->save();
      }
      // $budget->productSales()->saveMany($productSales);
      // $budget->save();

      $budgets = Budget::where('sale_id',$sale->id)->with('productSales')->orderbydesc('created_at')->get();

      return redirect()->route('budget-show',compact('sale'));
    }
}
