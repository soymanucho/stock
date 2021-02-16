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
use App\Receipt;
use App\Invoice;
use App\Budget;
use App\User;

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
  public function receipts()
  {
    return $this->hasMany(Receipt::class);
  }
  public function invoices()
  {
    return $this->hasMany(Invoice::class);
  }
  public function budgets()
  {
    return $this->hasMany(Budget::class);
  }
  public function statuses()
  {
    return $this->belongsToMany(Status::class)->withPivot(['created_at','updated_at','sale_id','status_id','id'])->orderBy('pivot_created_at');
  }
  public function latestStatus()
  {
    return $this->belongsToMany(Status::class)->withPivot(['created_at','updated_at','sale_id','status_id','id'])->orderBy('pivot_created_at','desc')->latest('pivot_created_at');
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
  }
  public function totalIVA()
  {
    return number_format(($this->totalAmount()*21)/100, 2, ',', '.');
  }
  public function user()
  {
    return $this->belongsTo(User::class,'user_id');
  }
}
