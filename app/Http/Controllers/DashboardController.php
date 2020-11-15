<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Product;
use App\Client;

class DashboardController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
      // notify()->success('Welcome to Laravel Notify ⚡️');
      // connectify('success', 'Connection Found', 'Success Message Here');
      // drakify('success');
      // drakify('error');
      // smilify('success', 'You are successfully reconnected');
      // emotify('success', 'You are awesome, your data was successfully created');

      return view('dashboard.home');
  }
  public function historicSales()
  {
    $SalesAmountByMonth =DB::table('product_sale')
            ->select(DB::raw("DATE_FORMAT(created_at, '%m-%Y') as period, DATE_FORMAT(created_at, '%Y') as year, DATE_FORMAT(created_at, '%m') as month, coalesce(sum(price*amount),0) as sum,coalesce(count(*),0) as count"))
            ->groupBy("period")
            ->groupBy("year")
            ->groupBy("month")
            ->orderby('year','ASC')
            ->orderby('month','ASC')
            // ->havingRaw('count > 0')
            ->get();

    $SalesByHour =DB::table('product_sale')
            ->select(DB::raw("DATE_FORMAT(created_at, '%H') as hour, coalesce(sum(price*amount),0) as sum,coalesce(count(*),0) as count"))
            ->groupBy("hour")
            ->orderby('hour','ASC')
            ->get();

    $SalesByWeekDay =DB::table('product_sale')
            ->select(DB::raw("DAYOFWEEK(created_at) as daynumber,DAYNAME(created_at) as dayname, coalesce(sum(price*amount),0) as sum,coalesce(count(*),0) as count"))
            ->groupBy("daynumber")
            ->groupBy("dayname")
            ->orderby('daynumber','ASC')
            ->get();
    //dd($SalesAmountByMonth,$SalesByHour,$SalesByWeekDay);
    return view('dashboard.historic',compact('SalesAmountByMonth','SalesByHour','SalesByWeekDay'));

  }
}
