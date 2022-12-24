<?php

namespace App\Http\Controllers;

use App\bill;
use App\custormer;
use App\orders;
use App\products;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function listBill(){
        $bill = bill::all();
        return view('admin.bill.list-bill',compact('bill'));
    }
    public function listOrder($id){
        $bill= bill::find($id);
       // $customer = custormer::where('id',)
        $order = orders::join('products AS sp','sp.id','=','orders.product_id')
            ->join('discount AS sale','sp.discount_id','=','sale.id')
           // ->join('user AS user','user.id','=','bill.user_id')
            ->where('bill_id',$id)
            ->select('sp.name AS name_sp','orders.price AS price_sp','orders.number as sl','sale.percent as sale')->get();
        return view('admin.bill.list-order',compact('bill','order'));
    }
    public function EditBill(Request $request,$id){
        $bill =  bill::find($id);
        $bill ->status = $request->status;
        $bill ->user_id = $request->user_id;
        $bill->save();
        alert()->toast('Thông tin đơn hàng cập nhật thành công', 'success')->persistent(false)->autoClose(1200);
        return redirect(route('bill-list'));
    }
}
