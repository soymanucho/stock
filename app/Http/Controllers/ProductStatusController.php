<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProductSale;
use App\ProductStatus;
use App\Sale;

class ProductStatusController extends Controller
{
  public function edit(Sale $sale, ProductSale $productSale, ProductStatus $productStatus)
  {
    $productSale = ProductSale::where('id',$productSale->id)->first();
    $productStatus = ProductStatus::where('id',$productStatus->id)->first();
    $productSale->status()->associate($productStatus)->save();

    return redirect()->back()->with('sale');
  }
}
