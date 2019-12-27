<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Sale;
use App\Product;
use App\ProductStatus;
use App\Receipt;

class ProductSale extends Model
{
  use SoftDeletes;

  protected $table = 'product_sale';

  protected $dates = ['created_at','updated_at','deleted_at'];

  protected $fillable = ['product_id','sale_id','amount','price','accepted_amount','product_status_id','receipt_id'];

  public function sale()
  {
    return $this->belongsTo(Sale::class);
  }
  public function receipt()
  {
    return $this->belongsTo(Receipt::class);
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
