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
    $products = Product::orderby('name')->with('brand')->get();
    // dd($products);
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
    flash('Producto creado exitosamente!')->success();
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
    flash('Se ha editado al producto')->warning();
    return redirect()->route('product-show');
  }
  public function detail(Product $product)
  {
    return view('product.detail',compact('product'));
  }

  public function selectApi(Request $request)
  {
    $search = $request->search;

    if($search == ''){
       $products = Product::orderby('name','asc')->with('brand')->limit(10)->get();
    }else{
       $products = Product::orderby('name','asc')
          ->where('name', 'like', '%' .$search . '%')
          ->orWhereHas('brand',function($query) use($search)
          {
            $query->where('name','like','%'.$search.'%');
          })
          ->limit(5)->with('brand')->get();
    }
    $response = array();
    foreach($products as $product){
       $response[] = array(
            "id"=>$product->id,
            "text"=>$product->name.' - '.$product->brand->name.' (quedan '.$product->stock.' unidades)',
            "cost"=>$product->cost,
            "amount"=>'1',
            "margin"=>'0',
            "price"=>$product->cost,
            "totalPrice"=>$product->cost
       );
    }

    return json_encode($response);
  }

}
