<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Supplier;
use App\Product;

class ProductSupplier extends Model
{
  use SoftDeletes;

  protected $dates = ['created_at','updated_at','deleted_at'];

  protected $fillable = ['price','product_id','supplier_id'];

  // public function supplier()
  // {
  //   return $this->belongsTo(Supplier::class);
  // }
  // public function product()
  // {
  //   return $this->belongsTo(Product::class);
  // }

}
