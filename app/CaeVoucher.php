<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaeVoucher extends Model
{
  protected $dates = ['created_at','updated_at','deleted_at','ini_date','fin_date'];

  protected $fillable = ['number'];

}
