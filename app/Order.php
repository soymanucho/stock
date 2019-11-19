<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\DB;

use App\Supplier;
use App\Product;

class Order extends Model
{
  use SoftDeletes;

  protected $dates = ['created_at','updated_at','deleted_at'];

  protected $fillable = ['supplier_id','total_price','user_id'];

  public function supplier()
  {
    return $this->belongsTo(Supplier::class,'supplier_id');
  }

  public function products()
  {
    return $this->belongsToMany(Product::class)->withPivot('ordered_amount','accepted_amount', 'price')->withTimestamps();
  }

  public function totalAmount()
  {
    return $total = DB::table('order_product')->where('order_id', $this->id)->sum(DB::raw('accepted_amount * price'));
  }

}
