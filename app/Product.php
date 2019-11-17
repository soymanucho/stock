<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\DB;

use App\Sale;
use App\Brand;
use App\Category;
use App\ProductGender;

class Product extends Model
{
  use SoftDeletes;
  protected $dates = ['created_at','updated_at','deleted_at'];

  protected $fillable = ['code','price','size','description','stock','category_id','brand_id'];

  public static function valueOfStock()
  {
    return  DB::table('products')->where('stock','>',0)->sum(DB::raw('stock * price'));
  }

  public static function amountofItemsInStock()
  {
    return  DB::table('products')->where('stock','>',0)->sum(DB::raw('stock'));
  }

  public function sales()
  {
    return $this->belongsToMany(Sale::class, 'product_sale', 'product_id', 'sale_id');
  }

  public function timesSold()
  {
    return  DB::table('product_sale')->where('product_id', $this->id)->count();
  }

  public function brand()
  {
    return $this->belongsTo(Brand::class,'brand_id');
  }

  public function category()
  {
    return $this->belongsTo(Category::class,'category_id');
  }


}
