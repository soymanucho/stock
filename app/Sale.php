<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\Pivot;
use App\PaymentType;
use App\Client;
use App\Product;


class Sale extends Model
{
  public function paymentType()
  {
      return $this->belongsTo(PaymentType::class,'paymentType_id');
  }

  public function client()
  {
      return $this->belongsTo(Client::class,'client_id');
  }

  public function products()
  {
    return $this->belongsToMany(Product::class)->withPivot('amount', 'price')->withTimestamps();
  }

  public function totalAmount()
  {
    return $total = DB::table('product_sale')->where('sale_id', $this->id)->sum(DB::raw('amount * price'));
  }
}
