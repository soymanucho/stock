<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

use App\Supplier;
use App\Product;

class ProductSupplier extends Pivot
{

  protected $dates = ['created_at','updated_at'];

  protected $fillable = ['price','product_id','supplier_id'];

  public function supplier()
  {
    return $this->belongsTo(Supplier::class);
  }
  public function product()
  {
    return $this->belongsTo(Product::class);
  }

}
