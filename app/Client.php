<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\DB;

use App\Sale;
use App\Address;

class Client extends Model
{
  use SoftDeletes;

  protected $dates = ['created_at','updated_at','deleted_at'];

  protected $fillable = ['name','address_id','cuit'];

  public static function totalAmountOfClients(){
     return  DB::table('clients')->count();
  }

  public function address()
  {
    return $this->belongsTo(Address::class);
  }

  public function fullAddress()
  {
    return $this->address->street.' nº '.$this->address->number.' '.$this->address->floor.', '.$this->address->location->name.', '.$this->address->location->province->name;
  }

  public function contacts()
  {
      return $this->morphMany(Contact::class, 'contactable');
  }

  public function sales()
   {
      return $this->hasMany(Sale::class, 'client_id');
   }

   public function totalPurchases(){
     return  Sale::where('client_id', '=', $this->id)->count();
   }

   public function totalSpent()
   {
     $mySales = $this->sales()->pluck('id')->toArray();
       return  DB::table('product_sale')->whereIn('sale_id', $mySales)->sum(DB::raw('accepted_amount * price'));
   }
}
