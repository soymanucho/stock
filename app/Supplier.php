<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Product;
use App\Address;
use App\Contact;

class Supplier extends Model
{
  use SoftDeletes;

  protected $dates = ['created_at','updated_at','deleted_at'];

  protected $fillable = ['name','address_id'];

  public function fullAddress()
  {
    return $this->address->street.' nº '.$this->address->number.' '.$this->address->floor.', '.$this->address->location->name.', '.$this->address->location->province->name;
  }

  public function address()
  {
    return $this->belongsTo(Address::class);
  }

  public function products()
  {
    return $this->belongsToMany(Product::class,'product_supplier')->withPivot('price');
  }

  public function contacts()
  {
      return $this->morphMany(Contact::class, 'contactable');
  }

}
