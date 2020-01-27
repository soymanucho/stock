<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
  protected $dates = ['created_at','updated_at','deleted_at','emissions_date','expiration_date'];

  protected $fillable = ['number','prefix-number','cae_voucher_id','sale_id'];
}
