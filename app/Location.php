<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Province;
use App\Adress;

class Location extends Model
{

  use SoftDeletes;
  protected $dates = ['created_at','updated_at','deleted_at'];

  protected $fillable = ['name','province_id'];

  public function province()
  {
    return $this->belongsTo(Province::class)->withTrashed();
  }

  public function adresses()
  {
    return $this->hasMany(Adress::class);
  }

}
