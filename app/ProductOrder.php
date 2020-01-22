<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Order;
use App\Product;
use App\ProductStatus;
// use App\Receipt;

class ProductOrder extends Model
{
  use SoftDeletes;

  protected $table = 'order_product';

  protected $dates = ['created_at','updated_at','deleted_at'];

  protected $fillable = ['product_id','order_id','ordered_amount','price','accepted_amount','product_status_id'];

  public function order()
  {
    return $this->belongsTo(Order::class);
  }
  public function product()
  {
    return $this->belongsTo(Product::class);
  }
  public function status()
  {
    return $this->belongsTo(ProductStatus::class,'product_status_id');
  }
}
