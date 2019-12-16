<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Brand;

class BrandController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function show()
  {
    $brands = Brand::orderby('name')->get();
    return view('brand.show',compact('brands'));
  }

  public function new()
  {
    $brand = new Brand();
    return view('brand.new',compact('brand'));
  }

  public function delete(Brand $brand)
  {
    $brand->delete();
    $brands = Brand::orderby('name')->get();
    return redirect()->route('brand-show');
  }

  public function edit(Brand $brand)
  {
    return view('brand.edit',compact('brand'));
  }

  public function save(Request $request)
  {
    // dd($request);
    $this->validate(
      $request,
      [
          'name' => 'required|string|max:100',

      ],
      [

      ],
      [
        'name' => 'Nombre',

      ]
    );
    $brand = new Brand;
    $brand->fill($request->all());
    $brand->save();


    return redirect()->route('brand-show');
  }

  public function update(Brand $brand, Request $request)
  {
    $this->validate(
      $request,
      [
          'name' => 'required|string|max:100',

      ],
      [

      ],
      [
        'name' => 'Nombre',
      ]
    );

    $brand->fill($request->all());
    $brand->save();

    return redirect()->route('brand-show');
  }
  public function detail(Brand $brand)
  {
    // $brand = Brand::where('id', $brand->id)->get()->first();
    return view('brand.detail',compact('brand'));
  }
}
