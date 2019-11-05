<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class Brand extends Model
{
  public function products()
 {
     return $this->hasMany(Product::class, 'brand_id');
 }
}
