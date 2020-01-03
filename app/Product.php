<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\DB;

use App\Sale;
use App\Brand;
use App\Order;
use App\Supplier;
use App\ProductSupplier;

class Product extends Model
{
  use SoftDeletes;

  protected $dates = ['created_at','updated_at','deleted_at'];

  protected $fillable = ['code','name','description','stock','brand_id'];

  // public static function valueOfStock()
  // {
  //   return  DB::table('products')->where('stock','>',0)->sum(DB::raw('stock * price'));
  // }

  public static function amountofItemsInStock()
  {
    return  DB::table('products')->where('stock','>',0)->sum(DB::raw('stock'));
  }

  public function sales()
  {
    return $this->hasMany(ProductSale::class);
  }

  public function orders()
  {
    return $this->belongsToMany(Order::class, 'order_product', 'product_id', 'order_id');
  }

  public function timesSold()
  {
    return $this->sales()->where('product_status_id','<>',1)->count();
    // return  DB::table('product_sale')->where('product_id', $this->id)->count();
  }

  public function timesOrdered()
  {
    return $this->orders->where('product_status_id','<>',1)->count();
    // return  DB::table('order_product')->where('product_id', $this->id)->count();
  }

  public function brand()
  {
    return $this->belongsTo(Brand::class,'brand_id')->withTrashed();
  }

  public function suppliers()
  {
    return $this->belongsToMany(Supplier::class,'product_supplier')->withPivot('price');
  }

  // public function prices()
  // {
  //   return $this->suppliers->pluck('price');
  // }

}
