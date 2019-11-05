<?php

namespace App;
use App\Client;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
  public function clients()
 {
     return $this->hasMany(Client::class, 'gender_id');
 }
}
