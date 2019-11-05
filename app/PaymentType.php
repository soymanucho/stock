<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sale;

class PaymentType extends Model
{
  public function sales()
 {
     return $this->hasMany(Sale::class, 'PaymentType_id');
 }
}
