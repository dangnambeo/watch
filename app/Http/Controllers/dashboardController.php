<?php

namespace App\Http\Controllers;

use App\bill;
use App\orders;
use App\products;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    public function dashboard(){
        $bill= bill::orderBy('created_at','desc')->paginate(6);
        $bill_day=bill::whereDay('created_at', Carbon::now()->day)->get();
        $bill_month=bill::whereMonth('created_at', Carbon::now()->month)->get();
        $sp_bill = products::leftjoin('orders','orders.product_id','=','products.id')
            ->leftjoin('bill','bill.id','=','orders.bill_id')
            ->where('bill.status','!=',3)
            ->groupBy('products.id','products.name','products.img','products.cate_id','products.quantity','products.price','products.description','products.discount_id','bill.created_at','bill.status')
            ->select(
                'products.id as id','products.name as name','products.img as img','products.cate_id as cate_id','products.quantity as quantity','products.price as price','products.description as description',
                'products.discount_id as discount_id','bill.created_at as created_bill','bill.status as status',
                DB::raw('Sum(orders.number) as sl_ban')
            )->orderBy('sl_ban','desc')
            ->paginate(5);
        return view('admin.dashboard.turnover',compact('bill_month', 'bill','bill_day','sp_bill'));
    }
}
