<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSale extends Model
{
  use SoftDeletes;

  protected $table = 'product_sale';

  protected $dates = ['created_at','updated_at','deleted_at'];

  protected $fillable = ['product_id','sale_id','amount','price','accepted_amount','product_status_id'];

  public function sale()
  {
    return $this->belongsTo(Sale::class);
  }
  public function product()
  {
    return $this->belongsTo(Product::class);
  }
  public function status()
  {
    return $this->belongsTo(ProductStatus::class);
  }
}
