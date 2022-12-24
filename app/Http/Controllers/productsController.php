<?php

namespace App\Http\Controllers;

use App\products;
use App\orders;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class productsController extends Controller
{
    public function ListProduc(){
    //    $sp = products::all();
        $sp = products::leftjoin('orders','orders.product_id','=','products.id')
            ->groupBy('products.id','products.name','products.img','products.cate_id','products.quantity','products.price','products.description','products.discount_id')
            ->select(
                'products.id as id','products.name as name','products.img as img','products.cate_id as cate_id','products.quantity as quantity','products.price as price','products.description as description',
                'products.discount_id as discount_id',
                DB::raw('Sum(orders.number) as sl_ban')
            )
            ->get();
        return view('admin.products.list-produc',compact('sp'));
    }
    public function getAddProducts(){
        return view('admin.products.add-produc');
    }
    public function postAddProducts(Request $request){
        $sp = new products;
        $sp->name = $request->name;
        $sp->description = $request->description;
        $sp->price = $request->price;
        $sp->quantity = $request->quantity;
        $sp->cate_id = $request->cate_id;
        $sp->discount_id = $request->discount_id;
        if ($sp->save()) {
            if ($request->hasFile('img')) {
                $file = $request->img;
               // $file_name=$file->getClientOriginalName();
                $file->move('upload/ProducImg', $file->getClientOriginalName());
                $sp->img = "upload/ProducImg/" . $file->getClientOriginalName();
                $sp->save();
            }
        }
        alert()->toast('Thêm mới sản phẩm thành công', 'success')->persistent(false)->autoClose(1200);
        return redirect(route('list-produc'));
    }
    public function getEditProducts($id){
        $sp = products::findOrfail($id);
        return view('admin.products.edit-produc',compact('sp'));
    }
    public function postEditProducts(Request $request,$id){
        $sp = products::find($id);
        $sp->name = $request->name;
        $sp->description = $request->description;
        $sp->price = $request->price;
        $sp->quantity = $request->quantity;
        $sp->cate_id = $request->cate_id;
        $sp->discount_id = $request->discount_id;
        if ($sp->save()) {
            if ($request->hasFile('img')) {
                $file = $request->img;
                // $file_name=$file->getClientOriginalName();
                $file->move('upload/ProducImg', $file->getClientOriginalName());
                $sp->img = "upload/ProducImg/" . $file->getClientOriginalName();
                $sp->save();
            }
        }
        alert()->toast('Chỉnh sửa sản phẩm thành công', 'success')->persistent(false)->autoClose(1200);
        return redirect(route('list-produc'));
    }
    public function DelProducts($id){
        $sp = products::find($id);
        $sp->delete();
        alert()->toast('Xóa sản phẩm thành công', 'error')->persistent(false)->autoClose(1200);
        return back();
    }
}
