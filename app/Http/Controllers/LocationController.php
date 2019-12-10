<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Location;

class LocationController extends Controller
{
  public function selectApi(Request $request)
  {
    $search = $request->search;

    if($search == ''){
       $locations = Location::orderby('name','asc')->limit(5)->get();
    }else{
       $locations = Location::orderby('name','asc')
          ->where('name', 'like', '%' .$search . '%')
          ->orWhereHas('province',function($query) use($search)
          {
            $query->where('name','like','%'.$search.'%');
          })
          ->limit(5)->with('province')->get();
    }
    $response = array();
    foreach($locations as $location){
       $response[] = array(
            "id"=>$location->id,
            "text"=>$location->name.', '.$location->province->name
       );
    }

    return json_encode($response);
  }
}
