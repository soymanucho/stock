<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\DB;

use App\Sale;
use App\Address;
use App\PaymentDay;

class Client extends Model
{
  use SoftDeletes;

  protected $dates = ['created_at','updated_at','deleted_at'];

  protected $fillable = ['name','cuit','payment_day_id'];

  public static function totalAmountOfClients(){
     return  DB::table('clients')->count();
  }

  public function address()
  {
    return $this->hasOne(Address::class);
  }

  public function paymentDay()
  {
    return $this->belongsTo(PaymentDay::class);
  }

  public function midAddress()
  {
    return $this->address->street.' nº '.$this->address->number.' piso '.$this->address->floor;
  }
  public function fullAddress()
  {
    return $this->address->street.' nº '.$this->address->number.' piso '.$this->address->floor.' CP:'.$this->address->cp.', '.$this->address->location->name.', '.$this->address->location->province->name;
  }

  public function contacts()
  {
      return $this->morphMany(Contact::class, 'contactable');
  }

  public function sales()
   {
      return $this->hasMany(Sale::class, 'client_id');
   }
  public function lastSale()
   {
      return $this->hasMany(Sale::class, 'client_id')->latest();
   }

   public function totalPurchases(){
     return  Sale::where('client_id', '=', $this->id)->count();
   }

   public function totalSpent()
   {
     $mySales = $this->sales()->pluck('id')->toArray();
       return  DB::table('product_sale')->whereIn('sale_id', $mySales)->sum(DB::raw('amount * price'));
   }
}
