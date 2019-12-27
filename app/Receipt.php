<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

use App\Sale;
use App\ProductSale;

class Receipt extends Model
{
  use SoftDeletes;

  protected $dates = ['created_at','updated_at','deleted_at'];

  protected $fillable = ['receipt_id','sale_id'];

  public function sale()
  {
    return $this->belongsTo(Sale::class);
  }
  public function productSales()
  {
    return $this->hasMany(ProductSale::class);
  }
  public function totalAmount()
  {
    return $total = DB::table('product_sale')
                        ->join('receipts','receipts.id','=','product_sale.receipt_id')
                        ->join('product_statuses','product_sale.product_status_id','=','product_statuses.id')
                        ->where('receipt_id', $this->id)->where('product_statuses.name','<>','Cancelado')->sum(DB::raw('product_sale.amount * product_sale.price'));
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
