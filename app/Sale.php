<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\DB;

use App\PaymentType;
use App\Client;
use App\Status;
use App\Product;

class Sale extends Model
{
  use SoftDeletes;

  protected $dates = ['created_at','updated_at','deleted_at'];

  protected $fillable = ['client_id','payment_type_id','user_id'];

  public function paymentType()
  {
    return $this->belongsTo(PaymentType::class,'payment_type_id');
  }

  public function client()
  {
    return $this->belongsTo(Client::class,'client_id');
  }

  public function products()
  {
    return $this->hasMany(ProductSale::class);
  }

  public function statuses()
  {
    return $this->belongsToMany(Status::class);
  }

  public function latestStatus()
  {
    return $this->belongsToMany(Status::class)->latest();
  }

  public function totalAmount()
  {
    return $total = DB::table('product_sale')->where('sale_id', $this->id)->sum(DB::raw('amount * price'));
  }
}
