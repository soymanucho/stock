<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Product;
use App\Client;
use App\Supplier;
use App\Sale;
use App\Order;

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

    $newClients = Client::whereDate('created_at','>',\Carbon\Carbon::now()->subMonth())->count();
    $totalClients = Client::count();
    $newSuppliers = Supplier::whereDate('created_at','>',\Carbon\Carbon::now()->subMonth())->count();
    $totalSuppliers = Supplier::count();

    $newSales = Sale::whereDate('created_at','>',\Carbon\Carbon::now()->subMonth())->count();
    $totalSales = Sale::count();
    $newOrders = Order::whereDate('created_at','>',\Carbon\Carbon::now()->subMonth())->count();
    $totalOrders = Order::count();


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
    return view('dashboard.sales.historic',compact('SalesAmountByMonth','SalesByHour','SalesByWeekDay','newClients','newSuppliers','totalClients','totalSuppliers','newSales','newOrders','totalSales','totalOrders'));
  }

  public function historicOrders()
  {
    $newClients = Client::whereDate('created_at','>',\Carbon\Carbon::now()->subMonth())->count();
    $totalClients = Client::count();
    $newSuppliers = Supplier::whereDate('created_at','>',\Carbon\Carbon::now()->subMonth())->count();
    $totalSuppliers = Supplier::count();

    $newSales = Sale::whereDate('created_at','>',\Carbon\Carbon::now()->subMonth())->count();
    $totalSales = Sale::count();
    $newOrders = Order::whereDate('created_at','>',\Carbon\Carbon::now()->subMonth())->count();
    $totalOrders = Order::count();

    $OrdersAmountByMonth =DB::table('order_product')
            ->select(DB::raw("DATE_FORMAT(created_at, '%m-%Y') as period, DATE_FORMAT(created_at, '%Y') as year, DATE_FORMAT(created_at, '%m') as month, coalesce(sum(price*ordered_amount),0) as sum,coalesce(count(*),0) as count"))
            ->groupBy("period")
            ->groupBy("year")
            ->groupBy("month")
            ->orderby('year','ASC')
            ->orderby('month','ASC')
            // ->havingRaw('count > 0')
            ->get();

    $OrdersByHour =DB::table('order_product')
            ->select(DB::raw("DATE_FORMAT(created_at, '%H') as hour, coalesce(sum(price*ordered_amount),0) as sum,coalesce(count(*),0) as count"))
            ->groupBy("hour")
            ->orderby('hour','ASC')
            ->get();

    $OrdersByWeekDay =DB::table('order_product')
            ->select(DB::raw("DAYOFWEEK(created_at) as daynumber,DAYNAME(created_at) as dayname, coalesce(sum(price*ordered_amount),0) as sum,coalesce(count(*),0) as count"))
            ->groupBy("daynumber")
            ->groupBy("dayname")
            ->orderby('daynumber','ASC')
            ->get();
    //dd($SalesAmountByMonth,$SalesByHour,$SalesByWeekDay);
    return view('dashboard.orders.historic',compact('OrdersAmountByMonth','OrdersByHour','OrdersByWeekDay','newClients','newSuppliers','totalClients','totalSuppliers','newSales','newOrders','totalSales','totalOrders'));
  }

}
