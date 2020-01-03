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
    return $this->hasMany(ProductSale::class)->with('status');
  }

  public function statuses()
  {
    return $this->belongsToMany(Status::class)->withTimestamps();
  }

  public function latestStatus()
  {
    return $this->belongsToMany(Status::class)->latest();
  }

  public function totalAmount()
  {
    $totalAmount = 0;
    $products = $this->products;
    foreach ($products as $product) {
      if ($product->status->id <> 1) {
        $totalAmount = $totalAmount + ($product->price*$product->amount);
      }
    }
    return $totalAmount;


    // return $total = DB::table('product_sale')
    //                     ->join('product_statuses','product_sale.product_status_id','=','product_statuses.id')
    //                     ->where('sale_id', $this->id)->where('product_statuses.name','<>','Cancelado')->sum(DB::raw('amount * price'));
  }

  public function totalIVA()
  {
    return number_format(($this->totalAmount()*21)/100, 2, ',', '.');
  }
}
