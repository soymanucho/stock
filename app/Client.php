<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\DB;

use App\Gender;
use App\Sale;
use App\Address;

class Client extends Model
{
  use SoftDeletes;

  protected $dates = ['created_at','updated_at','deleted_at'];

  protected $fillable = ['first_name','last_name','phone','address_id','dni','birthdate','gender_id','email'];

  public static function totalAmountOfClients(){
     return  DB::table('clients')->count();
  }

  public function address()
  {
    return $this->belongsTo(Address::class);
  }

  public function gender()
  {
      return $this->belongsTo(Gender::class,'gender_id');
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
