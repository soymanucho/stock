<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Client;

class Gender extends Model
{
  use SoftDeletes;
  protected $dates = ['created_at','updated_at','deleted_at'];

  public function clients()
  {
    return $this->hasMany(Client::class, 'gender_id');
  }
}
