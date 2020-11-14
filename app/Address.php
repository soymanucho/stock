<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Location;
use App\Client;
use App\Supplier;

class Address extends Model
{
  use SoftDeletes;

  protected $dates = ['created_at','updated_at','deleted_at'];

  protected $fillable = ['street','number','floor','location_id','latitude','longitude','cp','client_id'];

  public function location()
  {
    return $this->belongsTo(Location::class)->withTrashed();
  }

  public function client()
  {
    return $this->belongsTo(Client::class);
  }

  public function province()
  {
    return $this->location->province();
  }


  public function suppliers()
  {
    return $this->hasMany(Supplier::class);
  }

  public function fullAddress()
  {
    return $this->street . ' ' . $this->number . ', ' . $this->location->name . ', '. $this->province->name;
  }

}
