<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

use App\Sale;
use App\CaeVoucher;
use App\ProductSale;

class Invoice extends Model
{
  use SoftDeletes;

  protected $dates = ['created_at','updated_at','deleted_at','emissions_date','expiration_date'];

  protected $fillable = ['number','prefix-number','cae_voucher_id','sale_id'];


  public function sale()
  {
    return $this->belongsTo(Sale::class);
  }
  public function caeVoucher()
  {
    return $this->belongsTo(CaeVoucher::class);
  }
  public function productSales()
  {
    return $this->hasMany(ProductSale::class);
  }
  public function totalAmount()
  {
    $totalAmount = 0;
    $products = $this->productSales;
    foreach ($products as $product) {
      if ($product->status->name <> 'Cancelado') {
        $totalAmount = $totalAmount + ($product->price*$product->amount);
      }
    }
    return $totalAmount;

    // return $total = DB::table('product_sale')
    //                     ->join('receipts','receipts.id','=','product_sale.receipt_id')
    //                     ->join('product_statuses','product_sale.product_status_id','=','product_statuses.id')
    //                     ->where('receipt_id', $this->id)->where('product_statuses.name','<>','Cancelado')->sum(DB::raw('product_sale.amount * product_sale.price'));
  }

  public function totalIVA()
  {
    return ($this->totalAmount()*21)/100;
  }
  public function subtotal()
  {
    $total = $this->totalAmount();
    $IVA = $this->totalIVA();
    return $total-$IVA;
  }

}
