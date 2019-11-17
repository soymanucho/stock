<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Sale;

class PaymentType extends Model
{
  use SoftDeletes;
  protected $dates = ['created_at','updated_at','deleted_at'];
  
  public function sales()
 {
     return $this->hasMany(Sale::class, 'payment_type_id');
 }
}
