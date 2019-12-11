<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Brand;

class ProductController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function show()
  {
    $products = Product::orderby('name')->get();
    return view('product.show',compact('products'));
  }

  public function new()
  {
    $product = new Product();
    $brands = Brand::all();
    return view('product.new',compact('product','brands'));
  }

  public function edit(Product $product)
  {
    $brands = Brand::all();
    return view('product.edit',compact('product','brands'));
  }

  public function save(Request $request)
  {
    // dd($request);
    $this->validate(
      $request,
      [
          'code' => 'nullable|string|max:100',
          'name' => 'required|string|max:150',
          'description' => 'nullable|string|max:500',
          'stock'=> 'required|numeric',
          'brand_id'=> 'required|exists:brands,id',

      ],
      [

      ],
      [
        'code' => 'Código',
        'name' => 'Nombre',
        'description' => 'Descripción',
        'stock'=> 'Stock',
        'brand_id'=> 'Marca',
      ]
    );
    $product = new Product;
    $product->fill($request->all());
    $product->save();

    return redirect()->route('product-show');
  }

  public function update(Product $product, Request $request)
  {
    $this->validate(
      $request,
      [
          'code' => 'nullable|string|max:100',
          'name' => 'required|string|max:150',
          'description' => 'nullable|string|max:500',
          'stock'=> 'required|numeric',
          'brand_id'=> 'required|exists:brands,id',

      ],
      [

      ],
      [
        'code' => 'Código',
        'name' => 'Nombre',
        'description' => 'Descripción',
        'stock'=> 'Stock',
        'brand_id'=> 'Marca',
      ]
    );

    $product->fill($request->all());
    $product->save();

    return redirect()->route('product-show');
  }
  public function detail(Product $product)
  {
    return view('product.detail',compact('product'));
  }
}
