<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Sale;

class Status extends Model
{
  use SoftDeletes;

  protected $dates = ['created_at','updated_at','deleted_at'];

  protected $fillable = ['name'];

  public function sales()
  {
    return $this->belongsToMany(Sale::class)->withTimestamps();
  }

}
