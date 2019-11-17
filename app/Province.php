<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Location;

class Province extends Model
{
  use SoftDeletes;
  protected $dates = ['created_at','updated_at','deleted_at'];

  protected $fillable = ['name'];

  public function locations()
  {
    return $this->hasMany(Location::class);
  }
}
