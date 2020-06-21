<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CaeVoucher;

class ConfigurationController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function showCae()
  {
    $caeVouchers = CaeVoucher::orderby('ini_date','desc')->get();
    return view('configuration.showCae',compact('caeVouchers'));
  }

  public function newCae()
  {
    $caeVoucher = new CaeVoucher();
    return view('configuration.newCae',compact('caeVoucher'));
  }

  public function saveCae(Request $request)
  {
    // dd($request);
    $this->validate(
      $request,
      [
          'number' => 'required|string|max:100',
          'ini_date' => 'required|date',
          'fin_date'=> 'required|date',

      ],
      [

      ],
      [
        'number' => 'número cae',
        'ini_date' => 'fecha de inicio de vigencia',
        'fin_date' => 'fecha de fin de vigencia',
      ]
    );
    $caeVoucher = new CaeVoucher;
    $caeVoucher->fill($request->all());
    $caeVoucher->save();

    notify()->success('CAE creado con éxito!','Intemun');
    return redirect()->route('configuration-cae-show');
  }

  public function deleteCae(CaeVoucher $caeVoucher)
  {
    $caeVoucher = CaeVoucher::where('id',$caeVoucher->id)->delete();
    notify()->success('CAE eliminado.','Intemun');
    return redirect()->route('configuration-cae-show');
  }


}
