<?php

namespace App\Http\Controllers;

use App\category;
use App\products;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function ListCate(){
        $cate = category::all();
        return view('admin.Category.list-cate',compact('cate'));
    }
    public function listProductCate($id){
        $cate = category::find($id);
        $sp = products::where('cate_id',$id)->get();
        return view('admin.products.list-produc',compact('sp','cate'));
    }
    //public function getAddCate(){}
    public function postAddCate(Request $request){
        $cate = new category;
        $cate -> cate_tittle = $request -> cate_tittle;
        $cate->save();
        alert()->toast('Thêm chuyên mục thành công', 'success')->persistent(false)->autoClose(1200);
        return redirect(route('list-cate'));
    }
    public function getEditCate(Request $request,$id){
        $cate = category::findOrFail($id);
        return view('admin.Category.edit-cate',compact('cate'));
    }
    public function postEditCate(Request $request,$id){
        $cate = category::find($id);
        $cate -> cate_tittle = $request -> cate_tittle;
        $cate->save();
        alert()->toast('Chỉnh sửa chuyên mục thành công', 'success')->persistent(false)->autoClose(1200);
        return redirect(route('list-cate'));
    }
    public function DelCate($id){
        $cate = category::find($id);
        $cate ->delete();
        alert()->toast('Xóa chuyên mục thành công', 'error')->persistent(false)->autoClose(1200);
        return back();
    }
}
