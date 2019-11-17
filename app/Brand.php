<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Product;

class Brand extends Model
{
  use SoftDeletes;
  protected $dates = ['created_at','updated_at','deleted_at'];
  
  public function products()
 {
     return $this->hasMany(Product::class, 'brand_id');
 }
}
